<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CoffeeBreak
 *
 * @method static \Database\Factories\CoffeeBreakFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CoffeeBreak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoffeeBreak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoffeeBreak query()
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CoffeeBreak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoffeeBreak whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoffeeBreak whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoffeeBreak whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Event_Ticket_CoffeeBreak> $event_ticket
 * @property-read int|null $event_ticket_count
 * @mixin \Eloquent
 */
class CoffeeBreak extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function event_ticket(){
        return $this->hasMany(Event_Ticket_CoffeeBreak::class);
    }
}
