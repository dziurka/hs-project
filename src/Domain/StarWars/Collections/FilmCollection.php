<?php

namespace Domain\StarWars\Collections;

use Domain\StarWars\Models\Film;
use Illuminate\Database\Eloquent\Collection;

class FilmCollection extends Collection
{
    public function mapToURLKeys(): self
    {
        return $this->mapWithKeys(function (Film $film) {
            return [$film->url => $film];
        });
    }
}
