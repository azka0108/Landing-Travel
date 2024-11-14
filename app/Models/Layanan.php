<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Layanan extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'layanan'; // Sesuaikan dengan nama tabel sebenarnya
    protected $fillable = [
        'foto',
        'nama',
    ];
}
