<?php

namespace Domain\StarWars\Repositories\Swapi;

use Illuminate\Support\LazyCollection;

interface ISwapiPersonRepository
{
    public function getPersons(): LazyCollection;
}
