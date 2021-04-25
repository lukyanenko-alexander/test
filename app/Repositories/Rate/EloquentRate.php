<?php

namespace App\Repositories\Rate;

use App\Models\Rate;
use App\Repositories\BaseRepository;

class EloquentRate extends BaseRepository implements RateRepository
{
    /**
     * EloquentRate constructor.
     * @param Rate $model
     */
    public function __construct(Rate $model)
    {
        parent::__construct($model);
    }
}
