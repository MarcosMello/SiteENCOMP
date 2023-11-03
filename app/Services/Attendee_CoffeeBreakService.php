<?php

namespace App\Services;

use App\Repository\Interfaces\Attendee_CoffeeBreakRepositoryInterface;
use Illuminate\Support\Facades\DB;

class Attendee_CoffeeBreakService
{
    private Attendee_CoffeeBreakRepositoryInterface $Attendee_CoffeeBreakRepository;
    private LogService $logService;

    /**
     * @param Attendee_CoffeeBreakRepositoryInterface $Attendee_CoffeeBreakRepositoryInterface
     * @param LogService $logService
     */
    public function __construct(Attendee_CoffeeBreakRepositoryInterface $Attendee_CoffeeBreakRepositoryInterface, LogService $logService)
    {
        $this->Attendee_CoffeeBreakRepository = $Attendee_CoffeeBreakRepositoryInterface;
        $this->logService = $logService;
    }

    /**
     * Returns a collection of the attendee_CoffeeBreaks
     *
     * @param \App\Models\attendee_CoffeeBreak $model
     * @return \Illuminate\Support\Collection
     */
    public function index(): \Illuminate\Support\Collection
    {
        return DB::transaction(function () {
            return $this->Attendee_CoffeeBreakRepository->all();
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
            $attendee_CoffeeBreak = $this->Attendee_CoffeeBreakRepository->create($attributes);
            $this->logService->create($attendee_CoffeeBreak->id, $attendee_CoffeeBreak->attendee_uuid . "x" . $attendee_CoffeeBreak->event_coffee_break_id, 'attendee_CoffeeBreaks.create');

            return $attendee_CoffeeBreak;
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
            return $this->Attendee_CoffeeBreakRepository->find($id);
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
            $attendee_CoffeeBreak = $this->Attendee_CoffeeBreakRepository->update($attributes, $id);
            $this->logService->create($attendee_CoffeeBreak->id, $attendee_CoffeeBreak->attendee_uuid . "x" . $attendee_CoffeeBreak->event_coffee_break_id, 'attendee_CoffeeBreaks.update');

            return $attendee_CoffeeBreak;
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
            $attendee_CoffeeBreak = $this->Attendee_CoffeeBreakRepository->findOrFail($id);
            $deleted = $this->Attendee_CoffeeBreakRepository->destroy($id);

            if ($deleted) {
                $this->logService->create($attendee_CoffeeBreak->id, $attendee_CoffeeBreak->attendee_uuid . "x" . $attendee_CoffeeBreak->event_coffee_break_id, 'attendee_CoffeeBreaks.delete');
            }
            return $deleted;
        });
    }
}
