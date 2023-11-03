<?php

namespace App\Repository;

use App\Models\Event_Ticket_CoffeeBreak;
use App\Repository\Interfaces\Event_Ticket_CoffeeBreakRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class Event_Ticket_CoffeeBreakRepository extends BaseRepository implements Event_Ticket_CoffeeBreakRepositoryInterface
{
    #[Pure]
    public function __construct(Event_Ticket_CoffeeBreak $event_Ticket_CoffeeBreak)
    {
        parent::__construct($event_Ticket_CoffeeBreak);
    }
}
