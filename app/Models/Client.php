<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client
 *
 * @property-read \App\Models\Address|null $address
 * @method static \Database\Factories\ClientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $cpf
 * @property string $email
 * @property string $phone
 * @property int $address_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 */
class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'phone',
        'address_id'
    ];

    protected $with = [
        'address',
    ];

    /**
     * Returns the address relation object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
