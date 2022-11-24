<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_empresaseedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_empresas')->insert([
            'nit_empresa' => '10035410',
            'nom_empresa' => 'Cortes.LTDA',
            'tel_empresa' => '3126184366',
            'direccion_empresa' => 'cll 25# 14-32',
            'email_empresa' => 'cortespepito@gmail.com',
            'id_user' => '4'
        ]);

        DB::table('tbl_empresas')->insert([
            'nit_empresa' => '10035411',
            'nom_empresa' => 'Comfort.ltda',
            'tel_empresa' => '3142659879',
            'direccion_empresa' => 'cll 185# 22-12',
            'email_empresa' => 'comfexltda@gmail.com',
            'id_user' => '4'
        ]);

        DB::table('tbl_empresas')->insert([
            'nit_empresa' => '10035412',
            'nom_empresa' => 'CortesFernadez.SAS',
            'tel_empresa' => '5185555698',
            'direccion_empresa' => 'cra 68# 54-33',
            'email_empresa' => 'facoltelas@gmail.com',
            'id_user' => '4'
        ]);

        DB::table('tbl_empresas')->insert([
            'nit_empresa' => '10035413',
            'nom_empresa' => 'ElTelar.SAS',
            'tel_empresa' => '3114455661',
            'direccion_empresa' => 'cra 15# 34-11',
            'email_empresa' => 'eltelar@gmail.com',
            'id_user' => '5'
        ]);

        DB::table('tbl_empresas')->insert([
            'nit_empresa' => '10035414',
            'nom_empresa' => 'Hilosyagujas.SAS',
            'tel_empresa' => '3154685791',
            'direccion_empresa' => 'cll 155# 88-55',
            'email_empresa' => 'hilosyagujas@gmail.com',
            'id_user' => '5'
        ]);
    }
}
