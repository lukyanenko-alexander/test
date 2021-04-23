<?php

namespace App\Http\Domain\Comment;

use App\Http\Domain\BaseDomain;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\RepositoryInterface;

class CommentDomain extends BaseDomain
{
    private $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
