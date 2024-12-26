<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ReportExport implements FromView, WithStyles
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
    public function styles(Worksheet $sheet)
    {
        // Menambahkan border pada seluruh sel yang digunakan
        $highestRow = $sheet->getHighestRow(); // Baris terakhir
        $highestColumn = $sheet->getHighestColumn(); // Kolom terakhir

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'], // Warna hitam
                ],
            ],
        ]);

        // Menyesuaikan teks menjadi rata tengah untuk header
        $sheet->getStyle('A1:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        return [];
    }
}
