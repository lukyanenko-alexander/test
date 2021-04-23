<?php

namespace App\Http\Domain\Rate;

use App\Http\Domain\BaseDomain;
use App\Repositories\Rate\RateRepository;
use App\Repositories\RepositoryInterface;

class RateDomain extends BaseDomain
{
    private $repository;

    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
