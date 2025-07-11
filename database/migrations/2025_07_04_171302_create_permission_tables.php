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
        $teams = config('permission.teams');
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
        $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';

        throw_if(empty($tableNames), new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.'));
        throw_if($teams && empty($columnNames['team_foreign_key'] ?? null), new Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.'));

        Schema::create($tableNames['permissions'], static function (Blueprint $table) {
            // $table->engine('InnoDB');
            $table->bigIncrements('id'); // permission id
            $table->string('name');       // For MyISAM use string('name', 225); // (or 166 for InnoDB with Redundant/Compact row format)
            $table->string('guard_name'); // For MyISAM use string('guard_name', 25);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['roles'], static function (Blueprint $table) use ($teams, $columnNames) {
            // $table->engine('InnoDB');
            $table->bigIncrements('id'); // role id
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
            }
            $table->string('name');       // For MyISAM use string('name', 225); // (or 166 for InnoDB with Redundant/Compact row format)
            $table->string('guard_name'); // For MyISAM use string('guard_name', 25);
            $table->timestamps();
            if ($teams || config('permission.testing')) {
                $table->unique([$columnNames['team_foreign_key'], 'name', 'guard_name']);
            } else {
                $table->unique(['name', 'guard_name']);
            }
        });
        DB::table('roles')->insert([
            ['name' => 'admin', 'guard_name' => 'pessoas'],
            ['name' => 'secretaria', 'guard_name' => 'pessoas'],
            ['name' => 'diretor', 'guard_name' => 'pessoas'],
            ['name' => 'professor', 'guard_name' => 'pessoas'],
            ['name' => 'tecnico', 'guard_name' => 'pessoas'],
            ['name' => 'coordenador', 'guard_name' => 'pessoas'],
            ['name' => 'orientador', 'guard_name' => 'pessoas'],
            ['name' => 'inspetor', 'guard_name' => 'pessoas'],
            ['name' => 'secretario_escolar', 'guard_name' => 'pessoas'],
            ['name' => 'financeiro', 'guard_name' => 'pessoas'],
        ]);

        Schema::create($tableNames['model_has_permissions'], static function (Blueprint $table) use ($tableNames, $columnNames, $pivotPermission, $teams) {
            $table->unsignedBigInteger($pivotPermission);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign($pivotPermission)
                ->references('id') // permission id
                ->on($tableNames['permissions'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_permissions_team_foreign_key_index');

                $table->primary([$columnNames['team_foreign_key'], $pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            } else {
                $table->primary([$pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            }

        });

        Schema::create($tableNames['model_has_roles'], static function (Blueprint $table) use ($tableNames, $columnNames, $pivotRole, $teams) {
            $table->unsignedBigInteger($pivotRole);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign($pivotRole)
                ->references('id') // role id
                ->on($tableNames['roles'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_roles_team_foreign_key_index');

                $table->primary([$columnNames['team_foreign_key'], $pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
            } else {
                $table->primary([$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
            }
        });

        Schema::create($tableNames['role_has_permissions'], static function (Blueprint $table) use ($tableNames, $pivotRole, $pivotPermission) {
            $table->unsignedBigInteger($pivotPermission);
            $table->unsignedBigInteger($pivotRole);

            $table->foreign($pivotPermission)
                ->references('id') // permission id
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign($pivotRole)
                ->references('id') // role id
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary([$pivotPermission, $pivotRole], 'role_has_permissions_permission_id_role_id_primary');
        });
        
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'ver_escolas', 'guard_name' => 'pessoas'],
            ['id' => 2, 'name' => 'criar_escolas', 'guard_name' => 'pessoas'],
            ['id' => 3, 'name' => 'editar_escolas', 'guard_name' => 'pessoas'],
            ['id' => 4, 'name' => 'excluir_escolas', 'guard_name' => 'pessoas'],
            ['id' => 5, 'name' => 'ver_infraestrutura', 'guard_name' => 'pessoas'],
            ['id' => 6, 'name' => 'editar_infraestrutura', 'guard_name' => 'pessoas'],
            ['id' => 7, 'name' => 'ver_professores', 'guard_name' => 'pessoas'],
            ['id' => 8, 'name' => 'criar_professores', 'guard_name' => 'pessoas'],
            ['id' => 9, 'name' => 'editar_professores', 'guard_name' => 'pessoas'],
            ['id' => 10, 'name' => 'excluir_professores', 'guard_name' => 'pessoas'],
            ['id' => 11, 'name' => 'ver_alunos', 'guard_name' => 'pessoas'],
            ['id' => 12, 'name' => 'criar_alunos', 'guard_name' => 'pessoas'],
            ['id' => 13, 'name' => 'editar_alunos', 'guard_name' => 'pessoas'],
            ['id' => 14, 'name' => 'excluir_alunos', 'guard_name' => 'pessoas'],
            ['id' => 15, 'name' => 'ver_matriculas', 'guard_name' => 'pessoas'],
            ['id' => 16, 'name' => 'criar_matriculas', 'guard_name' => 'pessoas'],
            ['id' => 17, 'name' => 'editar_matriculas', 'guard_name' => 'pessoas'],
            ['id' => 18, 'name' => 'excluir_matriculas', 'guard_name' => 'pessoas'],
            ['id' => 19, 'name' => 'ver_turmas', 'guard_name' => 'pessoas'],
            ['id' => 20, 'name' => 'criar_turmas', 'guard_name' => 'pessoas'],
            ['id' => 21, 'name' => 'editar_turmas', 'guard_name' => 'pessoas'],
            ['id' => 22, 'name' => 'excluir_turmas', 'guard_name' => 'pessoas'],
            ['id' => 23, 'name' => 'ver_programas', 'guard_name' => 'pessoas'],
            ['id' => 24, 'name' => 'editar_programas', 'guard_name' => 'pessoas'],
            ['id' => 25, 'name' => 'vincular_escola_programa', 'guard_name' => 'pessoas'],
            ['id' => 26, 'name' => 'ver_usuarios', 'guard_name' => 'pessoas'],
            ['id' => 27, 'name' => 'criar_usuarios', 'guard_name' => 'pessoas'],
            ['id' => 28, 'name' => 'editar_usuarios', 'guard_name' => 'pessoas'],
            ['id' => 29, 'name' => 'atribuir_roles', 'guard_name' => 'pessoas'],
            ['id' => 30, 'name' => 'ver_relatorios', 'guard_name' => 'pessoas'],
            ['id' => 31, 'name' => 'exportar_relatorios', 'guard_name' => 'pessoas'],
        ]);

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
};
