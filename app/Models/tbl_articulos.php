<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_articulos extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_articulo';

    // protected $fillable = [
    //     'tipo_articulo',
    //     'nom_articulo',
    //     'material_articulo',
    //     'talla_articulo',
    //     'linea',
    //     'unidad_medida',
    //     'color_articulo',
    //     'descripcion_articulo'
    // ];
}
