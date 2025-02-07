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
    $currentMonth = now()->month;
    $month = $request->input('month', $currentMonth);

    // Mengambil detail yang sesuai dengan laporan di bulan tersebut
    $details = Details::whereHas('report', function ($query) use ($month) {
        $query->whereMonth('created_at', $month);
    })->with('limbah')->get();

    $groupedDetails = [];

    foreach ($details as $detail) {
        $limbahCode = $detail->limbah->name;
        $jenisLimbah = $detail->limbah->jenis_limbah; // Ambil jenis limbah dari relasi limbah
        $unit = $detail->unit;

        // Jika belum ada dalam array, inisialisasi dengan qty dan jenis limbah
        if (!isset($groupedDetails[$limbahCode])) {
            $groupedDetails[$limbahCode] = [
                'qty' => 0,
                'jenis_limbah' => $jenisLimbah,
                'unit' => $unit,
            ];
        }

        // Tambahkan qty ke dalam data
        $groupedDetails[$limbahCode]['qty'] += $detail->qty;
    }

    // dd($groupedDetails); // Debugging untuk melihat hasilnya

    // Siapkan data untuk chart
    $limbahCodes = array_keys($groupedDetails);
    $quantities = array_column($groupedDetails, 'qty');
    $jenisLimbah = array_column($groupedDetails, 'jenis_limbah');
    $unit = array_column($groupedDetails, 'unit');

    return view('pages.website.dashboard', compact('limbahCodes', 'quantities', 'jenisLimbah', 'month', 'groupedDetails'));
}    
}
