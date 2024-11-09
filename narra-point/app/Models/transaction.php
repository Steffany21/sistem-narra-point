<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'number_phone', 'customer_name', 'total_point'];
    protected $table = 'transaction';
    public $timestamps = false;

    public function dataMaster()
    {
        return $this->belongsTo(dataMaster::class, 'number_phone', 'number_phone');
    }

}
