<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'name' => 'Admin',
            'last_name' => 'SMK Antartika 1 Sidoarjo',
            'email' => 'admin@antartika.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' =>  \Illuminate\Support\Str::random(10),
            'role' => RoleEnum::Admin->value
        ]);
        \App\Models\User::factory(50)->create();
        $this->call(AlumniSeeder::class);
        $this->call(KuesionerSeeder::class);
    }
}
