<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Guide extends Model
{
    /** @use HasFactory<\Database\Factories\GuideFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'experience_years',
        'is_active'
    ];
}
