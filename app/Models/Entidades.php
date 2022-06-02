<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    protected $table = "entidades";
    protected $guarded = ["id","created_at","updated_at","deleted_at"];
}
