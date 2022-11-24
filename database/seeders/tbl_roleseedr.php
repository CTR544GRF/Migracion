<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class tbl_roleseedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles funcionales
        $admin = Role::create(['name' => 'Administrador']);
        $almacenista = Role::create(['name' => 'Almacenista']);
        $contador = Role::create(['name' => 'Contador']);
        $contador = Role::create(['name' => 'Cliente']);
        $contador = Role::create(['name' => 'Representante']);

        //Asignacion de Permisos
        // ,$almacenista,$contador]
        Permission::create(['name' => 'admin.home'])->syncRoles([$admin]);

        //usuarios
        // Permission::create(['name' => 'admin.home'])->syncRoles([$admin]);
    }
}
