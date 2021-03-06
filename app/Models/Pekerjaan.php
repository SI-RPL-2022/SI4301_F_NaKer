<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaans';
    protected $primaryKey = 'id_pekerjaan';

    protected $fillable = [
        'nama_pekerjaan',
        'deskripsi_pekerjaan',
        'kategori',
        'fee_pekerjaan',
        'deadline',
    ];
}
