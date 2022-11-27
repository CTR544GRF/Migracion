<?php

namespace App\Exports;

use App\Models\tbl_registros;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class SalidasExport implements FromCollection
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return tbl_registros::where('tipo', '=', 'Salida')->get();
    }
}
