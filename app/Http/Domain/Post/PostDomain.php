<?php

namespace App\Http\Domain\Post;

use App\Http\Domain\BaseDomain;
use App\Repositories\Post\PostRepository;
use App\Repositories\RepositoryInterface;

class PostDomain extends BaseDomain
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
