<?php

namespace App\Services;

use App\Repository\Interfaces\CoffeeBreakRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CoffeeBreakService
{
    private CoffeeBreakRepositoryInterface $CoffeeBreakRepository;
    private LogService $logService;

    /**
     * @param CoffeeBreakRepositoryInterface $CoffeeBreakRepositoryInterface
     * @param LogService $logService
     */
    public function __construct(CoffeeBreakRepositoryInterface $CoffeeBreakRepositoryInterface, LogService $logService)
    {
        $this->CoffeeBreakRepository = $CoffeeBreakRepositoryInterface;
        $this->logService = $logService;
    }

    /**
     * Returns a collection of the coffeeBreaks
     *
     * @param \App\Models\coffeeBreak $model
     * @return \Illuminate\Support\Collection
     */
    public function index(): \Illuminate\Support\Collection
    {
        return DB::transaction(function () {
            return $this->CoffeeBreakRepository->all();
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        return DB::transaction(function () use ($attributes){
            $coffeeBreak = $this->CoffeeBreakRepository->create($attributes);
            $this->logService->create($coffeeBreak->id, $coffeeBreak->name, 'coffeeBreaks.create');

            return $coffeeBreak;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(int $id): \Illuminate\Database\Eloquent\Model
    {
        return DB::transaction(function () use ($id){
            return $this->CoffeeBreakRepository->find($id);
        });
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(array $attributes, int $id): \Illuminate\Database\Eloquent\Model
    {
        return DB::transaction(function () use ($attributes, $id) {
            $coffeeBreak = $this->CoffeeBreakRepository->update($attributes, $id);
            $this->logService->create($coffeeBreak->id, $coffeeBreak->name, 'coffeeBreaks.update');

            return $coffeeBreak;
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return DB::transaction(function () use ($id){
            $coffeeBreak = $this->CoffeeBreakRepository->findOrFail($id);
            $deleted = $this->CoffeeBreakRepository->destroy($id);

            if ($deleted) {
                $this->logService->create($coffeeBreak->id, $coffeeBreak->name, 'coffeeBreaks.delete');
            }
            return $deleted;
        });
    }
}
