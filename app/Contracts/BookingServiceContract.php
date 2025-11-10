<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BookingServiceContract{
    /**
     * Создать бронирование
     *
     * @param array $input
     * @return Model
     */
    public function create(array $input): Model;
}
