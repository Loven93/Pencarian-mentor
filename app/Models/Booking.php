<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'mentor_id',
        'total_harga',
        'status',
    ];

    /**
     * Setiap Booking dimiliki oleh satu Mentor.
     * TAMBAHKAN FUNGSI INI
     */
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}
