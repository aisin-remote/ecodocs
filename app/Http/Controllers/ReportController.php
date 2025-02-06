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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        // dd($request);
        // Validasi input
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'license_plate' => 'required|string|max:255',
            'repeater-group' => 'required|array',
            'repeater-group.*.waste_code' => 'required|string|exists:limbahs,id', // Validasi untuk waste_code
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
            $limbah = Limbah::where('id', $item['waste_code'])->first();

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
private function getColumnForDate($date)
{
    // Mengambil bulan dan tanggal dari input $date
    $month = date('m', strtotime($date));
    $day = (int) date('d', strtotime($date));

    // Pemetaan kolom berdasarkan tanggal (misalnya 1 Januari pada kolom G, 2 Januari pada kolom H, dst.)
    // Jika template Excel Anda memiliki kolom untuk tanggal 1 hingga 31, kita bisa memetakan secara langsung.
    // Berikut adalah contoh pemetaan untuk Januari yang dimulai dari kolom G (kolom 7) untuk tanggal 1.
    $columnMapping = [
        1 => 'G', 2 => 'H', 3 => 'I', 4 => 'J', 5 => 'K', 6 => 'L',
        7 => 'M', 8 => 'N', 9 => 'O', 10 => 'P', 11 => 'Q', 12 => 'R',
        13 => 'S', 14 => 'T', 15 => 'U', 16 => 'V', 17 => 'W', 18 => 'X',
        19 => 'Y', 20 => 'Z', 21 => 'AA', 22 => 'AB', 23 => 'AC', 24 => 'AD',
        25 => 'AE', 26 => 'AF', 27 => 'AG', 28 => 'AH', 29 => 'AI', 30 => 'AJ', 31 => 'AK',
    ];

    // Menyusun tanggal untuk menghubungkan ke kolom yang tepat
    if (isset($columnMapping[$day])) {
        return $columnMapping[$day];
    }

    return null; // Jika tanggal tidak ditemukan (misalnya 32, dll.)
}

public function downloadReportsMonthly(Request $request)
{
    $selectedMonth = $request->query('month', date('m')); // Default bulan saat ini jika tidak dipilih
    $year = date('Y');

    // Pastikan path template benar
    $templatePath = public_path('templates/RekapMonthlyEcodocs.xlsx');
    if (!file_exists($templatePath)) {
        return response()->json(['error' => 'Template file not found.'], 404);
    }

    $spreadsheet = IOFactory::load($templatePath);
    $sheet = $spreadsheet->getActiveSheet();

    // Ambil data limbah
    $limbahData = DB::table('limbahs')->select('id', 'code', 'jenis_limbah', 'kode_internal', 'name')->get();
    $row = 9;
    $bulanTahun = date('F Y', mktime(0, 0, 0, $selectedMonth, 1, $year));
    $sheet->mergeCells('G6:AK6'); // Merge range G6 - AK6
    $sheet->setCellValue('G6', $bulanTahun);
    $sheet->getStyle('G6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('G6')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $sheet->getStyle('G6')->getFont()->setBold(true);


    foreach ($limbahData as $limbah) {
        $sheet->setCellValue('A' . $row, $limbah->code);
        $sheet->mergeCells("B{$row}:D{$row}");
        $sheet->setCellValue("B{$row}", $limbah->jenis_limbah);
        $sheet->setCellValue('E' . $row, $limbah->kode_internal);
        $sheet->setCellValue('F' . $row, $limbah->name);
    
        // Ambil data berdasarkan bulan
        $detailsData = DB::table('details')
            ->select(DB::raw('SUM(qty) as total_quantity'), DB::raw('DATE(created_at) as created_date'))
            ->where('limbah_id', $limbah->id)
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
    
        // Simpan tanggal yang sudah terisi
        $filledDates = [];
    
        foreach ($detailsData as $data) {
            $date = $data->created_date;
            $column = $this->getColumnForDate($date);
    
            if ($column) {
                $sheet->setCellValue($column . $row, $data->total_quantity);
                $filledDates[] = (int)date('d', strtotime($date)); // Simpan tanggal yang sudah terisi
            }
        }
    
        // Isi kolom kosong dengan 0 hanya untuk bulan yang dipilih
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $year);
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $column = $this->getColumnForDate(date("$year-$selectedMonth-$day"));
    
            if ($column && !in_array($day, $filledDates)) {
                $sheet->setCellValue($column . $row, 0);  // Set 0 jika tanggal tersebut tidak memiliki quantity
            }
        }
    
        $row++;
    }    

    $bulan = date('F', mktime(0, 0, 0, $selectedMonth, 1));
    $fileName = "ReportMonthlyEcodocs_{$bulan}.xlsx";

    $writer = new Xlsx($spreadsheet);
    $response = new StreamedResponse(function () use ($writer) {
        $writer->save('php://output');
    });

    $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    $response->headers->set('Cache-Control', 'max-age=0');

    return $response;
}
}
