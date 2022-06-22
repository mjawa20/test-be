<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSales extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'tgl',
        'cust_id',
        'subtotal',
        'diskon',
        'ongkir',
        'total_bayar',
    ];
}
