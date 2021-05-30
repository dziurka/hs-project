<?php

namespace Domain\StarWars\Repositories;

use Domain\StarWars\Collections\FilmCollection;
use Domain\StarWars\Models\Film;
use Illuminate\Database\Eloquent\Collection;

class FilmRepository implements IFilmRepository
{
    public function all(): FilmCollection|Collection
    {
        return Film::all();
    }

    public function create(array $attributes): Film
    {
        return Film::query()->create([
            'title' => $attributes['title'],
            'episode_id' => $attributes['episode_id'],
            'opening_crawl' => $attributes['opening_crawl'],
            'director' => $attributes['director'],
            'producer' => $attributes['producer'],
            'release_date' => $attributes['release_date'],
            'url' => $attributes['url'],
            'created_at' => $attributes['created'],
            'updated_at' => $attributes['edited'],
        ]);
    }

    public function insert(array $films): bool
    {
        return Film::query()->insert($films);
    }

    public function deleteAll(): void
    {
        Film::query()->delete();
    }

}
