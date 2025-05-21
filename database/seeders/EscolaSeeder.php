<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {
        // DB::table('schools')->insert([
        //     [
        //         'name' => 'Escola Primária',
        //         'email' => 'escola@gmail.com',
        //         'inep' => '12345678',
        //         'password' => bcrypt('password'),
        //         'address' => 'Rua das Flores, 123',
        //         'city' => 'São Paulo',
        //         'uf' => 'SP',
        //         'zip_code' => '01234-567',
        //         'phone' => '(11) 99999-9999',
        //         'diretor_id' => 1,
        //         'secretary_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ]);

    }
}
