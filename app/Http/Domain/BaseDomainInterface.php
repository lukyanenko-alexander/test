<?php

namespace App\Http\Domain;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\DatabaseManager;

interface BaseDomainInterface
{
    public function repository(): RepositoryInterface;

    public function database(): DatabaseManager;
}
