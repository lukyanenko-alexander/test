<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\BaseRepository;

class EloquentPost extends BaseRepository implements PostRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }
}
