<?php

namespace Domain\StarWars\Models;

use Domain\StarWars\Collections\FilmCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Support\Traits\HasUuidKey;

/**
 * Domain\StarWars\Models\Film
 *
 * @property string $id
 * @property string $title
 * @property int $episode_id
 * @property string $opening_crawl
 * @property string $director
 * @property string $producer
 * @property string $url
 * @property string $release_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 *     $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Domain\StarWars\Models\Person[] $persons
 * @property-read int|null $persons_count
 * @method static \Illuminate\Database\Eloquent\Builder|Film newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film query()
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereDirector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereEpisodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereOpeningCrawl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereProducer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereUrl($value)
 * @mixin \Eloquent
 * @method static FilmCollection|static[] all($columns = ['*'])
 * @method static FilmCollection|static[] get($columns = ['*'])
 */
class Film extends Model
{
    use Notifiable, HasUuidKey;

    protected $table = 'films';

    protected $fillable = [
        'id',
        'title',
        'episode_id',
        'opening_crawl',
        'director',
        'producer',
        'release_date',
        'url',
        'created_at',
        'updated_at'
    ];

    public function newCollection(array $models = []): FilmCollection
    {
        return new FilmCollection($models);
    }

    public function persons(): BelongsToMany
    {
        return $this->belongsToMany(
            Person::class, 'film_person', 'film_id', 'person_id'
        );
    }
}
