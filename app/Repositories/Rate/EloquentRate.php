<?php

namespace App\Repositories\Rate;

use App\Models\Rate;
use App\Repositories\BaseRepository;

class EloquentRate extends BaseRepository implements RateRepository
{
    public function __construct(Rate $model)
    {
        parent::__construct($model);
    }
}
