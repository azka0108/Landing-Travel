<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bisnis extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'Bisnis'; // Sesuaikan dengan nama tabel sebenarnya
    protected $fillable = [
        'foto',
        'nama',
        'content',
    ];
}
