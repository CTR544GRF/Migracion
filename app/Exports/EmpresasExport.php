<?php

namespace App\Exports;

use App\Models\tbl_empresas;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpresasExport implements FromCollection
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return tbl_empresas::all();
    }
}
