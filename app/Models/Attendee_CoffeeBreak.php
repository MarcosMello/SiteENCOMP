<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attendee_CoffeeBreak
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak query()
 * @property int $id
 * @property int $is_available
 * @property string $attndee_uuid
 * @property int $event_coffee_break_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak whereAttndeeUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak whereEventCoffeeBreakId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak whereUpdatedAt($value)
 * @property string $attendee_uuid
 * @property-read \App\Models\Attendee|null $attendee
 * @property-read \App\Models\Event_Ticket_CoffeeBreak $event_coffeeBreak
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee_CoffeeBreak whereAttendeeUuid($value)
 * @mixin \Eloquent
 */
class Attendee_CoffeeBreak extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_available',
        'attendee_uuid',
        'event_coffee_break_id'
    ];

    public function attendee(){
        return $this->belongsTo(Attendee::class, "attendee_uuid");
    }

    public function event_coffeeBreak(){
        return $this->belongsTo(Event_Ticket_CoffeeBreak::class);
    }
}
