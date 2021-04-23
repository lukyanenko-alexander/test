<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class EloquentUser extends BaseRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
