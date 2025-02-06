<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Limbah;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(Request $request)
    {
        // Ambil bulan saat ini jika tidak ada input 'month'
        $currentMonth = now()->month;
        $month = $request->input('month', $currentMonth);

        // Ambil laporan dan detail berdasarkan bulan
        $reports = Report::with(['details.limbah']) // Mengambil detail limbah
            ->whereMonth('created_at', $month) // Filter berdasarkan bulan laporan
            ->get();

        // Inisialisasi data untuk chart
        $limbahCodes = [];
        $quantitiesKg = [];
        $quantitiesDrum = [];

        // Array untuk mengelompokkan data berdasarkan kode limbah
        $groupedDetails = [];

        // Ambil detail yang sesuai dengan laporan di bulan tersebut
        $details = Details::whereHas('report', function ($query) use ($month) {
            $query->whereMonth('created_at', $month);
        })->get();

        foreach ($details as $detail) {
            // Cek apakah kode limbah sudah ada di grup
            $limbahCode = $detail->limbah->name;

            if (!isset($groupedDetails[$limbahCode])) {
                // Jika kode limbah belum ada di grup, inisialisasi array untuk qty
                $groupedDetails[$limbahCode] = [
                    'limbahCode' => $limbahCode,
                    'quantitiesKg' => 0,
                    'quantitiesDrum' => 0
                ];
            }

            // Cek unit untuk menentukan ke array mana nilai `qty` akan ditambahkan
            if (strtolower($detail->unit) === 'kg') {
                $groupedDetails[$limbahCode]['quantitiesKg'] += $detail->qty; // Jumlahkan kg
            } elseif (strtolower($detail->unit) === 'drum') {
                $groupedDetails[$limbahCode]['quantitiesDrum'] += $detail->qty; // Jumlahkan pcs
            }
        }

        // Siapkan data untuk chart berdasarkan data yang telah digabungkan
        foreach ($groupedDetails as $group) {
            $limbahCodes[] = $group['limbahCode'];
            $quantitiesKg[] = $group['quantitiesKg'];
            $quantitiesDrum[] = $group['quantitiesDrum'];
        }

        // Kembalikan ke view dengan data yang sudah digabungkan
        return view('pages.website.dashboard', compact('limbahCodes', 'quantitiesKg', 'quantitiesDrum', 'month'));
    }
}
