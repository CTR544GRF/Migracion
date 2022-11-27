<?php

namespace App\Exports;

use App\Models\tbl_usuarios;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return tbl_usuarios::select('id', 'cedula', 'email', 'nom_user', 'apellidos_user', 'fecha_ingreso', 'telefono_user', 'direccion_user')->get();
    }
}
