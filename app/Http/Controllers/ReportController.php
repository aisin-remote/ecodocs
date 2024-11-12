<?php

namespace App\Http\Controllers;

use App\Models\report;
use App\Http\Requests\StorereportRequest;
use App\Http\Requests\UpdatereportRequest;
use App\Models\Destination;
use App\Models\Details;
use App\Models\Limbah;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limbah = Limbah::all();
        $destination = Destination::all();
        return view('pages.website.report.index', compact('limbah', 'destination'));
    }
    public function getData()
    {
        $report = Report::with(['details', 'destination'])
            ->get()
            ->groupBy('id'); // Assuming 'id' is the primary key for reports

        // Create a response array to avoid duplicate report_ids
        $response = [];

        foreach ($report as $reportGroup) {
            $response[] = [
                'report_id' => $reportGroup->first()->id, // Menggunakan id dari report pertama
                'destination_id' => $reportGroup->first()->destination_id,
                'destination_name' => $reportGroup->first()->destination->name, // Tambahkan nama destination
                'license_plate' => $reportGroup->first()->license_plate,
                'details' => $reportGroup->map(function ($report) {
                    return $report->details; // Mengambil semua detail terkait
                })->flatten() // Menggabungkan detail
            ];
        }
        return response()->json($response);
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
        // dd($request->all());
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
        // dd($report_id);
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
        // dd($report_id);
        // Fetch the report by ID
        $report = Report::findOrFail($report_id);

        // Fetch other data needed for the form, like destinations and limbah
        $destination = Destination::all();
        $limbah = Limbah::all();

        // Return the view with the report and other data
        return view('pages.website.report.edit', compact('report', 'destination', 'limbah'))->render();;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatereportRequest $request, report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        if ($report->delete()) {
            return response()->json(['success' => 'Report deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete report'], 500);
        }
    }
}
