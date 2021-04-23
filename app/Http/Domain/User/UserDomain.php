<?php

namespace App\Http\Domain\User;

use App\Http\Domain\BaseDomain;
use App\Repositories\RepositoryInterface;
use App\Repositories\User\UserRepository;

class UserDomain extends BaseDomain
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
