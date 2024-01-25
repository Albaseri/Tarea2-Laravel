<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'color'];

    // Relación N:M
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
