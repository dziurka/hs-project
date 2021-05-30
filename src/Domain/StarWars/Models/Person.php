<?php

namespace Domain\StarWars\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Support\Traits\HasUuidKey;

/**
 * Domain\StarWars\Models\Person
 *
 * @property string $id
 * @property string $name
 * @property int|null $height
 * @property int|null $mass
 * @property string|null $hair_color
 * @property string|null $skin_color
 * @property string|null $eye_color
 * @property string|null $birth_year
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Domain\StarWars\Collections\FilmCollection|\Domain\StarWars\Models\Film[] $films
 * @property-read int|null $films_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Person newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person query()
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereBirthYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereEyeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereHairColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereMass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereSkinColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Person extends Model
{
    use Notifiable, HasUuidKey;

    protected $table = 'persons';

    protected $fillable = [
        'id',
        'name',
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'birth_year',
        'gender',
        'created_at',
        'updated_at'
    ];

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(
            Film::class, 'film_person', 'person_id', 'film_id'
        );
    }
}
