<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class tbl_usuarios extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'users';
    public function guardName()
    {
        return "web";
    }
}
