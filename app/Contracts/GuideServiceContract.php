<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface GuideServiceContract
{
    /**
     * Получить список гидов
     */
    public function list(array $input = []): Builder;
}
