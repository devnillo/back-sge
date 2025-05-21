<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $gerenciarEscolas = Permission::firstOrCreate(['name' => 'gerenciar_escolas']);
        // $gerarRelatorios  = Permission::firstOrCreate(['name' => 'gerar_relatorios']);

        // $secretario = Role::firstOrCreate(['name' => 'secretario_geral']);
        // $coordenador = Role::firstOrCreate(['name' => 'coordenador']);

        // $secretario->permissions()->sync([$gerenciarEscolas->id, $gerarRelatorios->id]);
        // $coordenador->permissions()->sync([$gerenciarEscolas->id]);

        $usuario = User::firstOrCreate(
            ['email' => 'admin@educacao.gov'],
            [
                'name' => 'Secretário da Educação',
                'password' => Hash::make('12345678'),
                'secretaria_id' => 1,
            ]
        );

        // $usuario->roles()->sync([$secretario->id]);
    }
}
