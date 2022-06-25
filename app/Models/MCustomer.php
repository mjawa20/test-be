<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'telp',
    ];

    public function transaksi()
    {
        return $this->hasMany(TSales::class);
    }
}
