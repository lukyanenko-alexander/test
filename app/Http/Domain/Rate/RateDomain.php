<?php

namespace App\Http\Domain\Rate;

use App\Http\Domain\BaseDomain;
use App\Repositories\Rate\RateRepository;
use App\Repositories\RepositoryInterface;

class RateDomain extends BaseDomain
{
    /**
     * @var RateRepository
     */
    private $repository;

    /**
     * RateDomain constructor.
     * @param RateRepository $repository
     */
    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return RepositoryInterface
     */
    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
