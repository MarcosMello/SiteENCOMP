<?php

namespace App\Repository;

use App\Models\Attendee_CoffeeBreak;
use App\Repository\Interfaces\Attendee_CoffeeBreakRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class Attendee_CoffeeBreakRepository extends BaseRepository implements Attendee_CoffeeBreakRepositoryInterface
{
    #[Pure]
    public function __construct(Attendee_CoffeeBreak $attendee_CoffeeBreak)
    {
        parent::__construct($attendee_CoffeeBreak);
    }

    public function findByAttendeeID(string $attendeeID){
        return $this->model->newQuery()->where('attendee_uuid', '=', $attendeeID)->get();
    }
}
