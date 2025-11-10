<?php

namespace App\Services;

use App\Contracts\GuideServiceContract;
use App\Models\Guide;
use Illuminate\Database\Eloquent\Builder;

class GuideService implements GuideServiceContract
{
    public function list(array $input = []): Builder
    {
        $builder = Guide::query();

        // Фильтрация по минимальному опыту
        isset($input['min_experience']) && $builder->where('experience_years', '>=', (int) $input['min_experience']);

        return $builder;
    }
}
