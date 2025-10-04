<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    const UPDATED_AT = null;

    protected $table = 'permintaan';

    protected $fillable = [
        'pemohon_id',
        'tgl_masak',
        'menu_makan',
        'jumlah_porsi',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(PermintaanDetail::class);
    }

    public function pemohon()
    {
        return $this->belongsTo(User::class, 'pemohon_id');
    }
}