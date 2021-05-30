<?php

namespace Domain\StarWars\Repositories;

use Domain\StarWars\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IPersonRepository
{
    public function create(array $attributes): Person|Model;

    public function insert(array $films): bool;

    public function all(): Collection;

    public function insertAttachedFilms(array $filmPersonPivots): bool;

    public function deleteAll(): void;

    public function queryIndex(): Builder;
}
