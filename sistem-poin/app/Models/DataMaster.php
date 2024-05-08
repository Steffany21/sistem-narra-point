<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    use HasFactory;

    protected $table = "data_masters";
    protected $fillable = [
        'customer_name',
        'phone_number',
        'address',
        'gender',
        'total_point'
    ];
    public $timestamps = false;
}
