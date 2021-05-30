<?php

namespace Domain\StarWars\Repositories;

use Domain\StarWars\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PersonRepository implements IPersonRepository
{
    public function all(): Collection
    {
        return Person::all();
    }

    public function create(array $attributes): Person|Model
    {
        return Person::query()->create($attributes);
    }

    public function insert(array $films): bool
    {
        return Person::query()->insert($films);
    }

    public function insertAttachedFilms(array $filmPersonPivots): bool
    {
        return (new Person())->films()->newPivotQuery()->insert($filmPersonPivots);
    }

    public function deleteAll(): void
    {
        Person::query()->delete();
    }

    public function queryIndex(): Builder
    {
        return Person::query()->with(['films']);
    }
}
