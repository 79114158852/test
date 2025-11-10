<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BookingServiceContract
{
    /**
     * Создать бронирование
     */
    public function create(array $input): Model;
}
