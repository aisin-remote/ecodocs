<?php

namespace App\Exports;


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class ReportExport
{
    protected $report;
    protected $templatePath;

    public function __construct($report, $templatePath)
    {
        $this->report = $report;
        $this->templatePath = $templatePath;
    }

    public function exportToFile($outputPath)
    {
        $currentDate = Carbon::now();

        // Format the date components
        $month = $currentDate->format('m'); // Two-digit month
        $day = $currentDate->format('d');   // Two-digit day

        // Concatenate the values
        $formattedValue = 'REG. No: ' . $this->report->surat_jalan . ' / GA /FIMBKA /' . $month . ' /' . $day;
        // Load template Excel file
        $spreadsheet = IOFactory::load($this->templatePath);

        // Get the active worksheet
        $sheet = $spreadsheet->getActiveSheet();

        // Surat Jalan
        $sheet->setCellValue('B2', $formattedValue);
        // tanggal pembuatan
        $sheet->setCellValue('AB5', $this->report->created_at->format('d/m/Y')); // Tanggal dibuat
        // npk pemohon
        $sheet->setCellValue('Y6', $this->report->approver->npk);
        $sheet->mergeCells('Y6:AJ6');
        $sheet->getStyle('Y6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('Y6')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        // nama pemohon
        $sheet->setCellValue('Y7', $this->report->approver->name);
        $sheet->mergeCells('Y7:AJ7');
        $sheet->getStyle('Y7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('Y7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        // departemen pemohon
        $sheet->setCellValue('Y8', $this->report->approver->dept);
        $sheet->mergeCells('Y8:AJ8');
        $sheet->getStyle('Y8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('Y8')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        // no hp pemohon
        $sheet->setCellValue('Y9', $this->report->approver->no_hp);
        $sheet->mergeCells('Y9:AJ9');
        $sheet->getStyle('Y9')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('Y9')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        // Tujuan Dibawa Keluar
        $sheet->setCellValue('C12', 'Tujuan Dibawa Keluar : Membuang Limbah');
        $sheet->mergeCells('C12:AJ13');
        $sheet->getStyle('C12')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('C12')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Populate dynamic item rows
        $rowStart = 18; // Mulai dari baris 8
        foreach ($this->report->details as $index => $detail) {
            // Pastikan properti data tersedia
            $limbahName = $detail->limbah->name ?? 'N/A';
            $limbahCode = $detail->limbah->code ?? 'N/A';
            $qty = $detail->qty ?? 'N/A';
            $unit = $detail->unit ?? 'N/A';
            $desc = $detail->desc ?? 'N/A';

            // Isi kolom sesuai dengan baris
            $sheet->setCellValue("C{$rowStart}", $index + 1);
            $sheet->getStyle("C{$rowStart}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("C{$rowStart}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            $sheet->setCellValue("D{$rowStart}", $limbahName);
            $sheet->mergeCells("D{$rowStart}:N{$rowStart}");
            $sheet->getStyle("D{$rowStart}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("D{$rowStart}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            $sheet->setCellValue("O{$rowStart}", $limbahCode);
            $sheet->mergeCells("O{$rowStart}:S{$rowStart}");
            $sheet->getStyle("O{$rowStart}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("O{$rowStart}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            $sheet->setCellValue("T{$rowStart}", $qty);
            $sheet->mergeCells("T{$rowStart}:X{$rowStart}");
            $sheet->getStyle("T{$rowStart}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("T{$rowStart}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            $sheet->setCellValue("Y{$rowStart}", $unit);
            $sheet->mergeCells("Y{$rowStart}:AC{$rowStart}");
            $sheet->getStyle("Y{$rowStart}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("Y{$rowStart}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            $sheet->setCellValue("AD{$rowStart}", $desc);
            $sheet->mergeCells("AD{$rowStart}:AJ{$rowStart}");
            $sheet->getStyle("AD{$rowStart}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("AD{$rowStart}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            $rowStart++;
        }

        // Save the updated Excel file
        $writer = new Xlsx($spreadsheet);
        $writer->save($outputPath);
    }
}
