<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class ReportExport implements FromView
{
    protected $report;

    public function __construct($report)
    {
        $this->report = $report;
    }

    public function view(): View
    {
        return view('pages.website.report.excel.report', [
            'report' => $this->report,
        ]);
    }
}
