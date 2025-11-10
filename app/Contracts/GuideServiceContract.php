<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface GuideServiceContract{
    /**
     * Получить список гидов
     *
     * @param array $input
     * @return Builder
     */
    public function list(array $input = []): Builder;
}
