<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Http\Requests\StoreApprovalRequest;
use App\Http\Requests\UpdateApprovalRequest;
use App\Models\Report;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.website.approval.index');
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
    public function store(StoreApprovalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprovalRequest $request, Approval $approval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approval $approval)
    {
        //
    }
    public function approve() {
        
    }
}
