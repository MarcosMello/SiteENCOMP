<?php

namespace App\Repository\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    /**
     * Returns all entries from a table in database.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Returns the data paginated.
     *
     * @param int $dataPerPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $dataPerPage): LengthAwarePaginator;

    /**
     * Create a new entry in database with the attributes.
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * Find an entry by its ID
     *
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;


    /**
     * Find an entry by its ID or Throws an error.
     *
     * @param int $id
     * @return Model
     */
    public function findOrFail(int $id): Model;


    /**
     * Update an entry in database by its ID with the attributes.
     *
     * @param array $attributes
     * @param int $id
     * @return Model|null
     */
    public function update(array $attributes, int $id): ?Model;

    /**
     * Destroy an entry from database by its ID
     *
     * @param int $id
     * @return bool|null
     */
    public function destroy(int $id): ?bool;
}
