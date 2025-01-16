<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\User;
use App\RoleEnum;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    // Database Pencipta Alumni Secara Acak 

    {
        $desa = [
            'Siwalanpanji', 'Buduran'
        ];
        $users = User::where('role', RoleEnum::Alumni->value)->get();
        foreach ($users as $user) {
            // Pilih jenis kelamin secara acak
            $jenis_kelamin = ['Laki-Laki', 'Perempuan'][array_rand(['Laki-Laki', 'Perempuan'])];
            // Pilih desa secara acak
            $alamat = $desa[array_rand($desa)];
            // Tempat lahir
            $tempat_lahir = 'Pamekasan';
            // Generate tanggal lahir antara usia 18 hingga 40 tahun
            $tanggal_lahir = Carbon::today()->subYears(rand(18, 40))->format('Y-m-d');
            // Generate tahun lulus dengan format tahun
            $tahun_lulus = Carbon::createFromFormat('Y-m-d', mt_rand(2010, 2023) . '-' . mt_rand(01, 12) . '-' . mt_rand(01, 30))->format('Y-m-d');
            Alumni::create([
                'user_id' => $user->id,
                'alamat' => $alamat,
                'telepon' => '6281234567890',
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'tahun_lulus' => $tahun_lulus
            ]);
        }
    }
}
