<?php

namespace App\Http\Domain;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\DatabaseManager;

interface BaseDomainInterface
{
    /**
     * @return RepositoryInterface
     */
    public function repository(): RepositoryInterface;

    /**
     * @return DatabaseManager
     */
    public function database(): DatabaseManager;
}
