<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;

class EloquentComment extends BaseRepository implements CommentRepository
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
}
