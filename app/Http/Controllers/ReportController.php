<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Models\Limbah;
use App\Models\Report;
use App\Models\Details;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorereportRequest;
use App\Http\Requests\UpdatereportRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $limbah = Limbah::all();
    $destination = Destination::all();

    $query = Report::with(['details', 'destination']);

    if ($request->month) {
        $query->whereMonth('created_at', $request->month);
    }
    if ($request->status) {
        $query->where('status', $request->status);
    }
    if ($request->destination) {
        $query->where('destination_id', $request->destination);
    }

    $reports = $query->get();

    // Ambil daftar bulan untuk dropdown
    $months = collect(range(1, 12))->map(function ($month) {
        return [
            'value' => str_pad($month, 2, '0', STR_PAD_LEFT),
            'name' => date('F', mktime(0, 0, 0, $month, 1)),
        ];
    });

    return view('pages.website.report.index', compact('limbah', 'destination', 'reports', 'months'));
}

    public function filter(Request $request)
    {
        return redirect()->route('report.index', [
            'month' => $request->month,
            'status' => $request->status,
            'destination' => $request->destination
        ]);
    }
    
    public function getReportData($id)
    {
        $reports = Report::with(['details.limbah', 'destination'])
            ->whereHas('details', function ($query) use ($id) {
                $query->where('report_id', $id);
            })
            ->first();

        return response()->json($reports);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorereportRequest $request)
    {
        // Validasi input
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'license_plate' => 'required|string|max:255',
            'repeater-group' => 'required|array',
            'repeater-group.*.waste_code' => 'required|string|exists:limbahs,code', // Validasi untuk waste_code
            'repeater-group.*.quantity' => 'required|numeric|min:0',
            'repeater-group.*.unit' => 'required|string',
            'repeater-group.*.description' => 'nullable|string',
            'repeater-group.*.photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp|max:5120', // Max size 2MB
        ]);

        // Menyimpan data ke tabel reports
        $report = Report::create([
            'destination_id' => $request->destination_id,
            'license_plate' => $request->license_plate,
            'status' => 'Pending'
        ]);

        // Menyimpan data ke tabel details
        foreach ($request->input('repeater-group') as $item) {
            // Menyimpan foto jika ada
            $photoPath = null;
            if (isset($item['photo'])) {
                $photoPath = $item['photo']->store('photos', 'public'); // simpan di storage/app/public/photos
            }

            // Mengambil ID limbah berdasarkan waste_code
            $limbah = Limbah::where('code', $item['waste_code'])->first();

            Details::create([
                'report_id' => $report->id, // Menghubungkan detail dengan report
                'limbah_id' => $limbah->id, // Menyimpan ID limbah
                'qty' => $item['quantity'],
                'unit' => $item['unit'],
                'desc' => $item['description'],
                'picture' => $photoPath, // simpan path foto
            ]);
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->back()->with('success', 'Data has been saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(report $report, $report_id)
    {
        // Fetch details for the given report_id
        $report = Report::with(['details.limbah'])->find($report_id);

        if (!$report) {
            return response()->json(['error' => 'Report not found'], 404);
        }

        return response()->json($report);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($report_id)
    {
        // Fetch the report by ID   
        $report = Report::with(['destination', 'details.limbah'])->findOrFail($report_id);

        // Fetch other data needed for the form, like destinations and limbah
        $destination = Destination::all();
        $limbah = Limbah::all();

        // Return the view with the report and other data
        return view('pages.website.report.edit', compact('report', 'destination', 'limbah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'license_plate' => 'required|string|max:255',
            'repeater-group' => 'required|array',
            'repeater-group.*.waste_code' => 'required|string|exists:limbahs,code', // Validasi untuk waste_code
            'repeater-group.*.quantity' => 'required|numeric|min:0',
            'repeater-group.*.unit' => 'required|string',
            'repeater-group.*.description' => 'nullable|string',
            'repeater-group.*.photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp|max:5120', // Max size 2MB
        ]);

        try {
            DB::beginTransaction();

            // Update report
            Report::where('id', $request->report_id)->update([
                'destination_id' => $validatedData['destination_id'],
                'license_plate' => $validatedData['license_plate'],
            ]);

            foreach ($request->input('repeater-group') as $item) {
                // Handle photo upload if it exists
                $photoPath = null;
                if (isset($item['photo'])) {
                    $photoPath = $item['photo']->store('photos', 'public'); // Save in storage/app/public/photos
                }

                // Retrieve the limbah ID using waste_code
                $limbah = Limbah::where('code', $item['waste_code'])->first();

                if (!$limbah) {
                    throw new \Exception('Invalid waste_code: ' . $item['waste_code']);
                }

                // Update or create details
                Details::updateOrCreate(
                    [
                        'report_id' => $request->report_id,
                        'limbah_id' => $limbah->id,
                    ],
                    [
                        'qty' => $item['quantity'],
                        'unit' => $item['unit'],
                        'desc' => $item['description'],
                        'picture' => $photoPath,
                    ]
                );
            }

            DB::commit();
            return redirect('/report')->with('success', 'Data has been updated successfully!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($report_id)
    {
        $report = Report::findOrFail($report_id);
        try {
            DB::beginTransaction();

            $report->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Report deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete report!');
        }
    }
    public function download($id)
{
    // Ambil data report berdasarkan ID
    $report = Report::with(['approver', 'details.limbah'])->findOrFail($id);

    // Template Excel file path
    $templatePath = public_path('templates/FormTemplate.xlsx');

    // Output Excel file path
    $fileName = 'report_' . $report->surat_jalan . '.xlsx';
    $outputPath = storage_path('app/public/reports/' . $fileName);
    $dbFilePath = 'reports/' . $fileName; // Path untuk disimpan di database

    // Periksa apakah file sudah ada atau tidak
    if (!Storage::exists('public/' . $dbFilePath)) {
        // Jika file belum ada, ekspor data ke Excel
        $export = new ReportExport($report, $templatePath);
        $export->exportToFile($outputPath);
    }

    // Unduh file hasil ekspor
    return response()->download($outputPath)->deleteFileAfterSend(true); // Menghapus file setelah diunduh
}
public function downloadReportsMonthly(Request $request)
{
    $month = $request->input('month');
    $limbah = Limbah::pluck('name')->toArray();

    // Ambil data dari tabel `details` berdasarkan bulan yang dipilih
    $reports = Details::join('limbahs', 'details.limbah_id', '=', 'limbahs.id')
        ->whereIn('limbahs.name', $limbah) // Filter hanya limbah yang ada di UKL-UPL Induk
        ->whereMonth('details.created_at', $month)
        ->select('details.qty', 'details.created_at', 'limbahs.name')
        ->get();

        dd($reports);


    $templatePath = public_path('templates/RekapMonthlyEcodocs.xlsx');
    $spreadsheet = IOFactory::load($templatePath);
    $sheet = $spreadsheet->getActiveSheet();

    $columns = [
        'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK'
    ];

    // Inisialisasi array untuk menyimpan qty berdasarkan nama limbah dan tanggal
    $dataLimbah = [];

    foreach ($limbah as $namaLimbah) {
        $dataLimbah[$namaLimbah] = array_fill(1, 31, 0);
    }

    // Mapping qty berdasarkan nama limbah dan tanggal
    foreach ($reports as $report) {
        $day = (int)$report->created_at->format('d'); // Ambil tanggal
        $namaLimbah = $report->nama_limbah;

        if (isset($dataLimbah[$namaLimbah]) && $day >= 1 && $day <= 31) {
            $dataLimbah[$namaLimbah][$day] += $report->qty; // Jumlahkan jika ada lebih dari satu entri
        }
    }

    // Menentukan baris awal pengisian data (mulai dari baris 9)
    $row = 9; 

    // Mengisi setiap baris untuk setiap limbah
    foreach ($dataLimbah as $namaLimbah => $qtyData) {
        $sheet->setCellValue('B' . $row, $namaLimbah); // Kolom B untuk nama limbah

        foreach ($columns as $index => $column) {
            $day = $index + 1; // Tanggal mulai dari 1-31
            $sheet->setCellValue($column . $row, $qtyData[$day]); 
        }

        $row++; // Pindah ke baris berikutnya untuk limbah berikutnya
    }

    // Simpan file
    $writer = new Xlsx($spreadsheet);
    $fileName = 'reports_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
    $filePath = storage_path('app/public/' . $fileName);
    $writer->save($filePath);

    // Mengunduh file
    return response()->download($filePath)->deleteFileAfterSend(true);
}


}
