<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimbahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limbah = [
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A1', 'name' => 'KARDUS'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A2', 'name' => 'PALLET BEKAS (PALLET KAYU)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A3', 'name' => 'PALLET BEKAS (PALLET KARDUS)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A4', 'name' => 'PALLET BEKAS (PALLET PLASTIK)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A5', 'name' => 'KAYU'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A6', 'name' => 'PLASTIK PURGING (PURGING EX PRODUKSI INJ)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A7', 'name' => 'PLASTIK RUNNER (RUNNER EX PRODUKSI INJ)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A8', 'name' => 'LIMBAH DOMESTIK (Non B3 KANTIN, KANTOR, KERTAS DAUN)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A9', 'name' => 'BOX PLASTIK'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A10', 'name' => 'PART NG PLASTIK (HANDLE DLL)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A12', 'name' => 'PART NG ALUMUNIUM (PART NG ASS UNIT)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A13', 'name' => 'PART NG BESI (HANDLE DLL)'],
            ['code' => '', 'jenis_limbah'=>'Non B3', 'kode_internal'=>'A13', 'name' => 'BESI BEKAS (SLEEVE, TROLLY, VALVE)'],
            ['code' => 'B323-2', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B1', 'name' => 'SLUDGE IPAL (WWT)'],
            ['code' => 'B323-2', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B2', 'name' => 'SLUDGE PAINTING'],
            ['code' => 'B104-D', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B3', 'name' => 'KEMASAN BEKAS TERKONTAMINASI (JERIGEN TERKONTAMINASI B3)'],
            ['code' => 'B104-D', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B4', 'name' => 'KEMASAN BEKAS TERKONTAMINASI (KALENG TERKONTAMINASI B3)'],
            ['code' => 'B104-D', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B5', 'name' => 'KEMASAN BEKAS TERKONTAMINASI (DRUM TERKONTAMINASI B3)'],
            ['code' => 'B110-D', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B6', 'name' => 'LIMBAH MAJUN & APD BEKAS TERKONTAMINASI'],
            ['code' => 'A323-3', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B7', 'name' => 'DEBU DUST COLLECTOR'],
            ['code' => 'B107-D', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B8', 'name' => 'LIMBAH ELEKTRONIK (LAMPU TL, PCB, CRT, WIRE RUBBER DLL)'],
            ['code' => 'B313-3', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B9', 'name' => 'DROSS'],
            ['code' => 'A323-3', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B10', 'name' => 'KIRIKO/GRAM'],
            ['code' => 'B313-2', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B11', 'name' => 'SLAG'],
            ['code' => 'A337-1', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B19', 'name' => 'LIMBAH MEDIS/KLINIK'],
            ['code' => 'A312-2', 'jenis_limbah'=>'B3 PADAT', 'kode_internal'=>'B20', 'name' => 'FILTER KACA'],
            ['code' => 'B105-D', 'jenis_limbah'=>'B3 CAIR', 'kode_internal'=>'B12', 'name' => 'OLI BEKAS'],
            ['code' => 'B105-D', 'jenis_limbah'=>'B3 CAIR', 'kode_internal'=>'B13', 'name' => 'AIR TERKONTAMINASI B3 [KEKOTANZO]'],
            ['code' => 'B105-D', 'jenis_limbah'=>'B3 CAIR', 'kode_internal'=>'B14', 'name' => 'AIR TERKONTAMINASI B3 [OVER SPRAY CAT]'],
            ['code' => 'B105-D', 'jenis_limbah'=>'B3 CAIR', 'kode_internal'=>'B15', 'name' => 'AIR TERKONTAMINASI B3 [PIT DIE CASTING]'],
            ['code' => 'A345-1', 'jenis_limbah'=>'B3 CAIR', 'kode_internal'=>'B16', 'name' => 'COOLANT BEKAS'],
            ['code' => 'B105-D', 'jenis_limbah'=>'B3 CAIR', 'kode_internal'=>'B17', 'name' => 'THINER BEKAS'],
            ['code' => 'B105-D', 'jenis_limbah'=>'B3 CAIR', 'kode_internal'=>'B18', 'name' => 'TONER'],
        ];
        

        DB::table('limbahs')->insert($limbah);
    }
}
