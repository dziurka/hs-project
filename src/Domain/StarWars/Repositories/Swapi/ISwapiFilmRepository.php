<?php

namespace Domain\StarWars\Repositories\Swapi;

use Illuminate\Support\LazyCollection;

interface ISwapiFilmRepository
{
    public function getFilms(): LazyCollection;
}
