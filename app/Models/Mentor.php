<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // TAMBAHKAN BLOK KODE INI
    protected $fillable = [
        'nama',
        'email',
        'bidang_keahlian',
        'tarif_per_jam',
        'deskripsi',
    ];
}