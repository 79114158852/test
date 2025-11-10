<?php

namespace App\Services;

use App\Models\HuntingBooking;
use App\Contracts\BookingServiceContract;
use Illuminate\Database\Eloquent\Model;

class BookingService implements BookingServiceContract
{
    public function create(array $input): Model
    {
        return HuntingBooking::create($input);
    }
}
