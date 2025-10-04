<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'permintaan_detail';

    protected $fillable = [
        'permintaan_id',
        'bahan_id',
        'jumlah_diminta',
    ];

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_id');
    }
}
