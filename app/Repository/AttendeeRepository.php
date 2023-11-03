<?php

namespace App\Repository;

use App\Models\Attendee;
use App\Repository\Interfaces\AttendeeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\Pure;
use Ramsey\Uuid\Uuid;

class AttendeeRepository extends BaseRepository implements AttendeeRepositoryInterface
{
    #[Pure]
    public function __construct(Attendee $attendee)
    {
        parent::__construct($attendee);
    }

    public function firstOrCreate(array $attributes): Model
    {
        $fillableAttributes = Arr::only($attributes, $this->model->getFillable());
        return $this->model->newQuery()->firstOrCreate(["CPF" => $fillableAttributes["CPF"]], $fillableAttributes)->fresh();
    }

    public function findByUUID(string $id): ?Model
    {
        return $this->model->newQuery()->find($id);
    }

    public function findOrFailByUUID(string $id): Model
    {
        return $this->model->newQuery()->findOrFail($id);
    }

    public function updateByUUID(array $attributes, string $id): ?Model
    {
        $fillableAttributes = Arr::only($attributes, $this->model->getFillable());
        $model = $this->model->newQuery()->findOrFail($id);
        $model->update($fillableAttributes);
        return $model->fresh();
    }

    public function destroyByUUID(string $id): ?bool
    {
        $model = $this->model->newQuery()->findOrFail($id);
        return $model->delete();
    }
}
