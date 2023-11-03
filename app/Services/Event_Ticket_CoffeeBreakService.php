<?php

namespace App\Services;

use App\Repository\Interfaces\Event_Ticket_CoffeeBreakRepositoryInterface;
use Illuminate\Support\Facades\DB;

class Event_Ticket_CoffeeBreakService
{
    private Event_Ticket_CoffeeBreakRepositoryInterface $Event_Ticket_CoffeeBreakRepository;

    /**
     * @param Event_Ticket_CoffeeBreakRepositoryInterface $Event_Ticket_CoffeeBreakRepositoryInterface
     * @param LogService $logService
     */
    public function __construct(
        Event_Ticket_CoffeeBreakRepositoryInterface $Event_Ticket_CoffeeBreakRepositoryInterface)
    {
        $this->Event_Ticket_CoffeeBreakRepository = $Event_Ticket_CoffeeBreakRepositoryInterface;
    }

    /**
     * Returns a collection of the event_Ticket_CoffeeBreaks
     *
     * @param \App\Models\event_Ticket_CoffeeBreak $model
     * @return \Illuminate\Support\Collection
     */
    public function index(): \Illuminate\Support\Collection
    {
        return DB::transaction(function () {
            return $this->Event_Ticket_CoffeeBreakRepository->all();
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
            $event_Ticket_CoffeeBreak = $this->Event_Ticket_CoffeeBreakRepository->create($attributes);

            return $event_Ticket_CoffeeBreak;
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
            return $this->Event_Ticket_CoffeeBreakRepository->find($id);
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
            $event_Ticket_CoffeeBreak = $this->Event_Ticket_CoffeeBreakRepository->update($attributes, $id);

            return $event_Ticket_CoffeeBreak;
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
            $event_Ticket_CoffeeBreak = $this->Event_Ticket_CoffeeBreakRepository->findOrFail($id);
            $deleted = $this->Event_Ticket_CoffeeBreakRepository->destroy($id);

            return $deleted;
        });
    }
}
