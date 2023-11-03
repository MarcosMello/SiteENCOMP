<?php

namespace App\Services;

use App\Repository\Interfaces\AttendeeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class AttendeeService
{
    private AttendeeRepositoryInterface $attendeeRepository;
    private LogService $logService;

    public function __construct(AttendeeRepositoryInterface $attendeeRepository, LogService $logService)
    {
        $this->attendeeRepository = $attendeeRepository;
        $this->logService = $logService;
    }

    public function index(): \Illuminate\Support\Collection
    {
        return DB::transaction(function (){
            return $this->attendeeRepository->all();
        });
    }

    public function create(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        return DB::transaction(function () use ($attributes){
            $attendee = $this->attendeeRepository->firstOrCreate($attributes);
            $this->logService->createWithStringId($attendee->id, $attendee->name, 'attendee.create');

            return $attendee;
        });
    }

    /**
     * @throws \Throwable
     */
    public function show(string $id): \Illuminate\Database\Eloquent\Model
    {
        return DB::transaction(function () use ($id) {
            $this->attendeeRepository->findByUUID($id);
        });
    }

    public function update(array $attributes, string $id): \Illuminate\Database\Eloquent\Model
    {
        return DB::transaction(function () use ($attributes, $id) {
            $attendee = $this->attendeeRepository->updateByUUID($attributes, $id);
            $this->logService->createWithStringId($attendee->id, $attendee->name, 'attendee.update');

            return $attendee;
        });
    }

    public function destroy(string $id): bool
    {
        return DB::transaction(function () use ($id) {
            $attendee = $this->attendeeRepository->findOrFailByUUID($id);
            $deleted = $this->attendeeRepository->destroyByUuid($id);

            if ($deleted) {
                $this->logService->createWithStringId($attendee->id, $attendee->name, 'attendee.delete');
            }

            return $deleted;
        });
    }
}
