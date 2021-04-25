<?php

namespace App\Http\Domain;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseDomain implements BaseDomainInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repository()->all($this->relationsAll());
    }

    /**
     * @param string $id
     * @return Model
     */
    public function show(string $id): Model
    {
        return $this->repository()->show($id, $this->relationsShow());
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes = []): Model
    {
        return $this->repository()->create($attributes);
    }

    /**
     * @param Model $model
     * @param array $attributes
     * @return Model
     */
    public function update(Model $model, array $attributes = []): Model
    {
        return $this->repository()->update($model, $attributes);
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function destroy(Model $model): bool
    {
        return $this->repository()->destroy($model);
    }

    /**
     * @return array
     */
    public function relationsAll(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function relationsShow(): array
    {
        return [];
    }

    /**
     * @return DatabaseManager
     */
    public function database(): DatabaseManager
    {
        return app(DatabaseManager::class);
    }
}
