<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asentamientos extends Model
{
    protected $table = "asentamientos";
    protected $guarded = ["id","created_at","updated_at","deleted_at"];
}
