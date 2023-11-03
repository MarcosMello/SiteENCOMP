<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Event_Ticket_CoffeeBreakRepositoryInterface
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak query()
 * @property int $id
 * @property int $eventID
 * @property string $event_name
 * @property string $ticket_name
 * @property int $coffee_break_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak whereCoffeeBreakId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak whereEventID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak whereEventName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak whereTicketName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event_Ticket_CoffeeBreak whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendee_CoffeeBreak> $attendee_CoffeeBreak
 * @property-read int|null $attendee__coffee_break_count
 * @property-read \App\Models\CoffeeBreak $coffeeBreak
 * @mixin \Eloquent
 */
class Event_Ticket_CoffeeBreak extends Model
{
    use HasFactory;

    protected $fillable = [
        'eventID',
        'event_name',
        'ticket_name',
        'coffee_break_id'
    ];

    public function coffeeBreak(){
        return $this->belongsTo(CoffeeBreak::class);
    }

    public function attendee_CoffeeBreak(){
        return $this->hasMany(Attendee_CoffeeBreak::class);
    }
}
