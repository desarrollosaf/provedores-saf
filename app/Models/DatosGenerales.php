<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosGenerales extends Model
{
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at", "deleted_at"];

    public function domicilio(){
        return $this->morphOne(Domicilio::class, 'domiciliable');
    }

    public function contacto(){
        return $this->morphOne(Contacto::class, 'contactable');
    }
}
