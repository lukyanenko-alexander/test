<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class EloquentCategory extends BaseRepository implements CategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}
