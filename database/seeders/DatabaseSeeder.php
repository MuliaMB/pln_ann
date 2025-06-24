<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('gardu_induks')->insert([
            ['nama' => 'GI Bukit Siguntang', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'GI Palembang', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('penyulangs')->insert([
            ['id_trafo_daya' => 1, 'nama' => 'Badak', 'setting_rele' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['id_trafo_daya' => 2, 'nama' => 'Harimau', 'setting_rele' => 50, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('trafo_dayas')->insert([
            ['id_gardu_induk' => 1, 'nama' => 'TD-130 MVA', 'kap' => '130 MVA', 'setting_rele' => '70-20 kV', 'created_at' => now(), 'updated_at' => now()],
            ['id_gardu_induk' => 2, 'nama' => 'TD-100 MVA', 'kap' => '100 MVA', 'setting_rele' => '70-20 kV', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
        DB::table('table_data_penyulangs')->insert([
            [
                'id_penyulang' => 1, 'bulan' => 6, 'tahun' => 2025,
                'amp_siang' => 40, 'teg_siang' => 20, 'mw_siang' => 10, 'persen_siang' => 85.5,
                'amp_malam' => 35, 'teg_malam' => 19, 'mw_malam' => 8, 'persen_malam' => 75.2,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_penyulang' => 2, 'bulan' => 6, 'tahun' => 2025,
                'amp_siang' => 50, 'teg_siang' => 21, 'mw_siang' => 12, 'persen_siang' => 90.0,
                'amp_malam' => 45, 'teg_malam' => 20, 'mw_malam' => 10, 'persen_malam' => 80.5,
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);

        DB::table('table_data_trafo_dayas')->insert([
            [
                'id_trafo_daya' => 1, 'bulan' => 6, 'tahun' => 2025,
                'amp_siang' => 120.5, 'teg_siang' => 70.2, 'mw_siang' => 100.0, 'persen_siang' => 92.3,
                'amp_malam' => 110.0, 'teg_malam' => 69.8, 'mw_malam' => 95.0, 'persen_malam' => 88.5,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'id_trafo_daya' => 2, 'bulan' => 6, 'tahun' => 2025,
                'amp_siang' => 90.0, 'teg_siang' => 70.0, 'mw_siang' => 80.0, 'persen_siang' => 80.0,
                'amp_malam' => 85.5, 'teg_malam' => 69.5, 'mw_malam' => 75.0, 'persen_malam' => 75.0,
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}
