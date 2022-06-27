<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myJob extends Model
{
    use HasFactory;
    protected $table = 'my_jobs';
    protected $primaryKey = 'id_myjob';

    protected $fillable = [
        'id_pekerjaan',
        'id_freelancer',
        'status',
    ];
}
