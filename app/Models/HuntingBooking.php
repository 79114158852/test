<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HuntingBooking extends Model
{
    protected $fillable = [
        'id',
        'tour_name',
        'hunter_name',
        'date',
        'guide_id',
        'participants_count'
    ];

    public function guide(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Guide::class);
    }
}
