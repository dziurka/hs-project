<?php

namespace Domain\StarWars\Repositories;

use Domain\StarWars\Collections\FilmCollection;
use Domain\StarWars\Models\Film;
use Illuminate\Database\Eloquent\Collection;

interface IFilmRepository
{
    public function create(array $attributes): Film;

    public function insert(array $films): bool;

    public function all(): FilmCollection|Collection;

    public function deleteAll(): void;
}
