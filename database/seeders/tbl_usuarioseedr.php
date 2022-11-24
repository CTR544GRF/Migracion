<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_usuarioseedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cedula' => '10035410',
            'email' => 'camilo1003diaz@gmail.com',
            'password' => bcrypt('camilo'),
            'nom_user' => 'Juan Camilo',
            'apellidos_user' => 'Diaz Florez',
            'fecha_ingreso' => '2022-11-02',
            'telefono_user' => '1234567891',
            'direccion_user' => 'calle 23',
            'cod_rol' => '1'
        ])->assignRole('Administrador');

        User::create([
            'cedula' => '10035411',
            'email' => 'jecatro648@misena.edu.co',
            'password' => bcrypt('estebanquito'),
            'nom_user' => 'Jeison Esteban',
            'apellidos_user' => 'Castro Carvajal',
            'fecha_ingreso' => '2022-11-02',
            'telefono_user' => '1234567891',
            'direccion_user' => 'calle 24',
            'cod_rol' => '2'
        ])->assignRole('Almacenista');

        User::create([
            'cedula' => '10035412',
            'email' => 'yury.gutierrez1@misena.edu.co',
            'password' => bcrypt('natalia'),
            'nom_user' => 'Yury Natalia',
            'apellidos_user' => 'Gutierrez Hernandez',
            'fecha_ingreso' => '2022-11-03',
            'telefono_user' => '1234567891',
            'direccion_user' => 'calle 25',
            'cod_rol' => '3'
        ])->assignRole('Contador');

        User::create([
            'cedula' => '10035413',
            'email' => 'suescunandres23@gmail.com',
            'password' => bcrypt('andres'),
            'nom_user' => 'Jualian Andres',
            'apellidos_user' => 'Suescun',
            'fecha_ingreso' => '2022-11-04',
            'telefono_user' => '1234567891',
            'direccion_user' => 'calle 26',
            'cod_rol' => '4'
        ])->assignRole('Cliente');

        User::create([
            'cedula' => '10035414',
            'email' => 'waramos176@misena.edu.co',
            'password' => bcrypt('william'),
            'nom_user' => 'William Andres',
            'apellidos_user' => 'Ramos Quiñones',
            'fecha_ingreso' => '2022-11-05',
            'telefono_user' => '1234567891',
            'direccion_user' => 'calle 27',
            'cod_rol' => '5'
        ])->assignRole('Representante');
    }
}
