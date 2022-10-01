<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbbarang extends Model
{
    use HasFactory;

    protected $table = "tbbarang";

    protected $fillable = [
        'kodebarang',
        'nama',
        'jenis',
        'merk',
        'satuan',
        'jumlah_stock',
        'harga_beli',
        'harga_jual',
    ];
}
