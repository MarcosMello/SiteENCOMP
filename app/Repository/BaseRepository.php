<?php

namespace App\Repository;

use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /** @var Model $model */
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function paginate(int $dataPerPage): LengthAwarePaginator
    {
        return $this->model->newQuery()->paginate($dataPerPage);
    }

    public function create(array $attributes): Model
    {
        $fillableAttributes = Arr::only($attributes, $this->model->getFillable());
        return $this->model->newQuery()->create($fillableAttributes)->fresh();
    }

    public function find(int $id): ?Model
    {
        return $this->model->newQuery()->find($id);
    }

    public function findOrFail(int $id): Model
    {
        return $this->model->newQuery()->findOrFail($id);
    }

    public function update(array $attributes, int $id): ?Model
    {
        $fillableAttributes = Arr::only($attributes, $this->model->getFillable());
        $model = $this->model->newQuery()->findOrFail($id);
        $model->update($fillableAttributes);
        return $model->fresh();
    }

    public function destroy(int $id): ?bool
    {
        $model = $this->model->newQuery()->findOrFail($id);
        return $model->delete();
    }
}
