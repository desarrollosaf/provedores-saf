<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = "municipios";
    protected $guarded = ["id","created_at","updated_at","deleted_at"];}
