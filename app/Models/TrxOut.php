<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxOut extends Model
{
    use HasFactory;

    protected $table = 't_keluar';
    protected $primaryKey = 'IdKeluar';
    public $timestamps = false;
}
