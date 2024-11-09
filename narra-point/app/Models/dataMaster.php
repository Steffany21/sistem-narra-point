<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataMaster extends Model
{
    use HasFactory;
    protected $fillable = ['number_phone', 'customer_name', 'address', 'gender', 'point', 'membership_level'];
    protected $table = 'data_master';
    public $timestamps = false;

    public function transactions()
    {
        return $this->hasMany(transaction::class, 'number_phone', 'number_phone');
    }

    // fungsi untuk menentukan level membership dari poin customer
    public function getMembershipLevel($point)
    {
        // if ($this->point >= 50000) {
        //     return 'Gold';
        // } elseif ($this-> point >= 10000) {
        //     return 'Silver';
        // } else {
        //     return 'Classic';
        // }

        if ($this->membership_level != null) {
            if($point >= 50000) {
                return 'Gold';
            } elseif ($point >= 10000) {
                return 'Silver';
            } else {
                return 'Classic';
            }   
        }    
        // return existing membership level jika sudah ada
        return $this->membership_level;
    }

    // fungsi untuk menetapkan level membership secara otomatis saat customer baru ditambahkan
    public static function boot() 
    {
        parent::boot();

        static::creating(function ($model) 
        {
            if ($model->membership_level == null) {
                $model->membership_level = 'Classic';
            }
        });
    }

}
