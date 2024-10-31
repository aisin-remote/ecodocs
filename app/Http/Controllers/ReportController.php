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
        $report = report::all();
        return response()->json($report);
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
    public function show(report $report, $id)
    {
        // dd($id);
        $detail = Details::with('limbah')->find($id);
        if (!$detail) {
            return response()->json(['error' => 'Detail not found'], 404);
        }
        return response()->json($detail);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(report $report)
    {
        //
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
    public function destroy(report $report)
    {
        //
    }
}
