<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @return Builder
     */
    public function newQuery(): Builder;

    /**
     * @param array $relations
     * @return Collection
     */
    public function all(array $relations = []): Collection;

    /**
     * @param string $id
     * @param array $relations
     * @return Model
     */
    public function show(string $id, array $relations = []): Model;

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param Model $model
     * @param array $attributes
     * @return Model
     */
    public function update(Model $model, array $attributes): Model;

    /**
     * @param Model $model
     * @return bool
     */
    public function destroy(Model $model): bool;
}
