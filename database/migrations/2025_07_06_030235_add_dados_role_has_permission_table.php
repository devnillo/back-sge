<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('role_has_permissions')->insert([
            // admin (role_id = 1)
            ['role_id' => 1, 'permission_id' => 1], ['role_id' => 1, 'permission_id' => 2],
            ['role_id' => 1, 'permission_id' => 3], ['role_id' => 1, 'permission_id' => 4],
            ['role_id' => 1, 'permission_id' => 5], ['role_id' => 1, 'permission_id' => 6],
            ['role_id' => 1, 'permission_id' => 7], ['role_id' => 1, 'permission_id' => 8],
            ['role_id' => 1, 'permission_id' => 9], ['role_id' => 1, 'permission_id' => 10],
            ['role_id' => 1, 'permission_id' => 11], ['role_id' => 1, 'permission_id' => 12],
            ['role_id' => 1, 'permission_id' => 13], ['role_id' => 1, 'permission_id' => 14],
            ['role_id' => 1, 'permission_id' => 15], ['role_id' => 1, 'permission_id' => 16],
            ['role_id' => 1, 'permission_id' => 17], ['role_id' => 1, 'permission_id' => 18],
            ['role_id' => 1, 'permission_id' => 19], ['role_id' => 1, 'permission_id' => 20],
            ['role_id' => 1, 'permission_id' => 21], ['role_id' => 1, 'permission_id' => 22],
            ['role_id' => 1, 'permission_id' => 23], ['role_id' => 1, 'permission_id' => 24],
            ['role_id' => 1, 'permission_id' => 25], ['role_id' => 1, 'permission_id' => 26],
            ['role_id' => 1, 'permission_id' => 27], ['role_id' => 1, 'permission_id' => 28],
            ['role_id' => 1, 'permission_id' => 29], ['role_id' => 1, 'permission_id' => 30],

            // secretaria (role_id = 2)
            ['role_id' => 2, 'permission_id' => 1], ['role_id' => 2, 'permission_id' => 2],
            ['role_id' => 2, 'permission_id' => 3], ['role_id' => 2, 'permission_id' => 5],
            ['role_id' => 2, 'permission_id' => 6], ['role_id' => 2, 'permission_id' => 7],
            ['role_id' => 2, 'permission_id' => 9], ['role_id' => 2, 'permission_id' => 11],
            ['role_id' => 2, 'permission_id' => 13], ['role_id' => 2, 'permission_id' => 15],
            ['role_id' => 2, 'permission_id' => 17], ['role_id' => 2, 'permission_id' => 19],
            ['role_id' => 2, 'permission_id' => 21], ['role_id' => 2, 'permission_id' => 23],
            ['role_id' => 2, 'permission_id' => 24], ['role_id' => 2, 'permission_id' => 25],
            ['role_id' => 2, 'permission_id' => 26], ['role_id' => 2, 'permission_id' => 27],
            ['role_id' => 2, 'permission_id' => 28], ['role_id' => 2, 'permission_id' => 29],
            ['role_id' => 2, 'permission_id' => 30],

            // diretor (role_id = 3)
            ['role_id' => 3, 'permission_id' => 1], ['role_id' => 3, 'permission_id' => 5],
            ['role_id' => 3, 'permission_id' => 7], ['role_id' => 3, 'permission_id' => 11],
            ['role_id' => 3, 'permission_id' => 13], ['role_id' => 3, 'permission_id' => 15],
            ['role_id' => 3, 'permission_id' => 17], ['role_id' => 3, 'permission_id' => 19],
            ['role_id' => 3, 'permission_id' => 21], ['role_id' => 3, 'permission_id' => 23],
            ['role_id' => 3, 'permission_id' => 29], ['role_id' => 3, 'permission_id' => 30],

            // professor (role_id = 4)
            ['role_id' => 4, 'permission_id' => 11], ['role_id' => 4, 'permission_id' => 15],
            ['role_id' => 4, 'permission_id' => 19],

            // tecnico (role_id = 5)
            ['role_id' => 5, 'permission_id' => 1], ['role_id' => 5, 'permission_id' => 5],
            ['role_id' => 5, 'permission_id' => 6], ['role_id' => 5, 'permission_id' => 23],
            ['role_id' => 5, 'permission_id' => 29], ['role_id' => 5, 'permission_id' => 30],

            // coordenador (role_id = 6)
            ['role_id' => 6, 'permission_id' => 1], ['role_id' => 6, 'permission_id' => 5],
            ['role_id' => 6, 'permission_id' => 7], ['role_id' => 6, 'permission_id' => 9],
            ['role_id' => 6, 'permission_id' => 11], ['role_id' => 6, 'permission_id' => 13],
            ['role_id' => 6, 'permission_id' => 15], ['role_id' => 6, 'permission_id' => 17],
            ['role_id' => 6, 'permission_id' => 19], ['role_id' => 6, 'permission_id' => 21],
            ['role_id' => 6, 'permission_id' => 29], ['role_id' => 6, 'permission_id' => 30],

            // orientador (role_id = 7)
            ['role_id' => 7, 'permission_id' => 11], ['role_id' => 7, 'permission_id' => 13],
            ['role_id' => 7, 'permission_id' => 15], ['role_id' => 7, 'permission_id' => 17],
            ['role_id' => 7, 'permission_id' => 19], ['role_id' => 7, 'permission_id' => 29],
            ['role_id' => 7, 'permission_id' => 30],

            // inspetor (role_id = 8)
            ['role_id' => 8, 'permission_id' => 1], ['role_id' => 8, 'permission_id' => 5],
            ['role_id' => 8, 'permission_id' => 11], ['role_id' => 8, 'permission_id' => 15],
            ['role_id' => 8, 'permission_id' => 19], ['role_id' => 8, 'permission_id' => 29],

            // secretario_escolar (role_id = 9)
            ['role_id' => 9, 'permission_id' => 1], ['role_id' => 9, 'permission_id' => 5],
            ['role_id' => 9, 'permission_id' => 11], ['role_id' => 9, 'permission_id' => 13],
            ['role_id' => 9, 'permission_id' => 15], ['role_id' => 9, 'permission_id' => 17],
            ['role_id' => 9, 'permission_id' => 19], ['role_id' => 9, 'permission_id' => 29],
            ['role_id' => 9, 'permission_id' => 30],

            // financeiro (role_id = 10)
            ['role_id' => 10, 'permission_id' => 15], ['role_id' => 10, 'permission_id' => 17],
            ['role_id' => 10, 'permission_id' => 23], ['role_id' => 10, 'permission_id' => 24],
            ['role_id' => 10, 'permission_id' => 29], ['role_id' => 10, 'permission_id' => 30],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
