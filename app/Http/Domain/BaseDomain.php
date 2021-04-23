<?php

namespace App\Http\Domain;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseDomain implements BaseDomainInterface
{
    public function all(array $relations = []): Collection
    {
        return $this->repository()->all($relations);
    }

    public function show(string $id, array $relations = []): Model
    {
        return $this->repository()->show($id, $relations);
    }

    public function create(array $attributes = []): Model
    {
        return $this->repository()->create($attributes);
    }

    public function update(Model $model, array $attributes = []): Model
    {
        return $this->repository()->update($model, $attributes);
    }

    public function destroy(Model $model): bool
    {
        return $this->repository()->destroy($model);
    }

    public function database(): DatabaseManager
    {
        return app(DatabaseManager::class);
    }
}
