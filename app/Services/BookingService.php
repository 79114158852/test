<?php

namespace App\Services;

use App\Contracts\BookingServiceContract;
use App\Models\HuntingBooking;
use Illuminate\Database\Eloquent\Model;

class BookingService implements BookingServiceContract
{
    public function create(array $input): Model
    {
        return HuntingBooking::create($input);
    }
}
