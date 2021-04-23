<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function newQuery(): Builder;

    public function all(array $relations = []): Collection;

    public function show(string $id, array $relations = []): Model;

    public function create(array $attributes): Model;

    public function update(Model $model, array $attributes): Model;

    public function destroy(Model $model): bool;

    public function attach(Model $model, array $attributes): Model;

    public function detach(Model $model, array $attributes): Model;
}
