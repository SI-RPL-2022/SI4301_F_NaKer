<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_myjob',
        'jumlah_pembayaran',
        'bukti_pembayaran',
        'status_pembayaran',
    ];
}
