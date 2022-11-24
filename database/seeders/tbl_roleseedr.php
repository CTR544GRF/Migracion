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
        // $contador = Role::create(['name' => 'Cliente']);
        // $contador = Role::create(['name' => 'Representante']);

        //Asignacion de Permisos
        // ,$almacenista,$contador]
        Permission::create(['name' => 'admin.home'])->syncRoles([$admin]);

        //Usuarios

        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.usuarios.csv'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.xlsx'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.print'])->syncRoles([$admin]);

        //Articulos almacenista

        Permission::create(['name' => 'admin.articulos.create'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.articulos.index'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.articulos.edit'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.articulos.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.articulos.csv'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.articulos.xlsx'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.articulos.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.articulos.print'])->syncRoles([$admin, $almacenista]);

        //Empresas

        Permission::create(['name' => 'admin.empresas.create'])->syncRoles([$admin, $contador]);
        Permission::create(['name' => 'admin.empresas.index'])->syncRoles([$admin, $contador]);
        Permission::create(['name' => 'admin.empresas.edit'])->syncRoles([$admin, $contador]);
        Permission::create(['name' => 'admin.empresas.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.empresas.csv'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.empresas.xlsx'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.empresas.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.empresas.print'])->syncRoles([$admin, $contador]);

        //Entradas lamacenista

        Permission::create(['name' => 'admin.entradas.create'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.entradas.index'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.entradas.edit'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.entradas.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.entradas.csv'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.entradas.xlsx'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.entradas.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.entradas.print'])->syncRoles([$admin, $almacenista]);

        //Facturas

        Permission::create(['name' => 'admin.facturas.create'])->syncRoles([$admin, $contador]);
        Permission::create(['name' => 'admin.facturas.index'])->syncRoles([$admin, $contador]);
        Permission::create(['name' => 'admin.facturas.edit'])->syncRoles([$admin, $contador]);
        Permission::create(['name' => 'admin.facturas.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.facturas.csv'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.facturas.xlsx'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.facturas.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.facturas.print'])->syncRoles([$admin, $contador]);

        //Inventarios

        Permission::create(['name' => 'admin.inventarios.index'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.inventarios.csv'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.inventarios.xlsx'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.inventarios.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.inventarios.print'])->syncRoles([$admin]);

        //Salidas amacenista

        Permission::create(['name' => 'admin.salidas.create'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.salidas.index'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.salidas.edit'])->syncRoles([$admin, $almacenista]);
        Permission::create(['name' => 'admin.salidas.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.salidas.csv'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.salidas.xlsx'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.salidas.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.salidas.print'])->syncRoles([$admin, $almacenista]);
    }
}
