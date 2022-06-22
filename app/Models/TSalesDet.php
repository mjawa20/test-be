<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSalesDet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sales_id',
        'barang_id',
        'harga_bandrol',
        'qty',
        'diskon_pct',
        'diskon_nilai',
        'harga_diskon',
        'total',
    ];
}
