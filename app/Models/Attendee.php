<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attendee
 *
 * @method static \Database\Factories\AtendeeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee query()
 * @property string $id
 * @property string $name
 * @property string $CPF
 * @property string $institution
 * @property int $is_student
 * @property string $institution_registration
 * @property string $city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereCPF($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereInstitutionRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereIsStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendee_CoffeeBreak> $coffeeBreaks
 * @property-read int|null $coffee_breaks_count
 * @mixin \Eloquent
 */
class Attendee extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
      'name',
      'email',
      'CPF',
    ];

    public function coffeeBreaks(){
        return $this->hasMany(Attendee_CoffeeBreak::class);
    }
}
