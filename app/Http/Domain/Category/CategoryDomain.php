<?php

namespace App\Http\Domain\Category;

use App\Http\Domain\BaseDomain;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CategoryDomain extends BaseDomain
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show(string $id, array $relations = []): Model
    {
        return parent::show($id, ['posts']);
    }

    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
