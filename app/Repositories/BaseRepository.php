<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function newQuery(): Builder
    {
        return $this->model->newQuery();
    }

    public function all(array $relations = []): Collection
    {
        return $this->newQuery()->with($relations)->latest()->get();
    }

    public function show(string $id, array $relations = []): Model
    {
        return $this->newQuery()->findOrFail($id)->loadMissing($relations);
    }

    public function create(array $attributes): Model
    {
        return $this->newQuery()->create($attributes);
    }

    public function update(Model $model, array $attributes): Model
    {
        $model->update($attributes);

        return $model->fresh();
    }

    public function destroy(Model $model): bool
    {
        return $model->delete();
    }

    public function attach(Model $model, array $attributes): Model
    {
        // TODO: Implement attach() method.
    }

    public function detach(Model $model, array $attributes): Model
    {
        // TODO: Implement detach() method.
    }
}
