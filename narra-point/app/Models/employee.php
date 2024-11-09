<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable = ['id_employee', 'name', 'number_phone', 'email'];
    protected $table = 'employee';
    public $timestamps = false;
}
