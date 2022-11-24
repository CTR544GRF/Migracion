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

    //Mutadores y Accesores
    protected function nom_articulo(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value)
        );
    }

    protected function material_articulo(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value)
        );
    }
    protected function color_articulo(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value)
        );
    }
}
