<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $street
 * @property string $district
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereZipCode($value)
 */
class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'district',
        'city',
        'state',
        'country',
        'zip_code',
    ];

    const NORMAL_NAME_RULE = ['required', 'min:4', 'max:255', 'string'];

    /**
     * Validation Rules for Address
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'street' => self::NORMAL_NAME_RULE,
            'district' => self::NORMAL_NAME_RULE,
            'city' => self::NORMAL_NAME_RULE,
            'state' => self::NORMAL_NAME_RULE,
            'country' => self::NORMAL_NAME_RULE,
            'zip_code' => ['required', 'digits:8', 'string'],
        ];
    }
}
