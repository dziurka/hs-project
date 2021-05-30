<?php

namespace Domain\StarWars\Actions;

use Domain\StarWars\Repositories\IFilmRepository;
use Domain\StarWars\Repositories\Swapi\ISwapiFilmRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class ImportStartWarsFilmsAction implements IImportStartWarsFilmsAction
{
    use RefreshDatabase;

    public function __construct(
        private ISwapiFilmRepository $swapiFilmRepository,
        private IFilmRepository $filmRepository,
    )
    {
        //
    }

    public function execute(): void
    {
        $films = [];
        foreach ($this->swapiFilmRepository->getFilms()->getIterator() as $film) {
            $films[] = [
                'id' => Str::orderedUuid()->toString(),
                'title' => $film->title,
                'episode_id' => $film->episode_id,
                'opening_crawl' => $film->opening_crawl,
                'director' => $film->director,
                'producer' => $film->producer,
                'release_date' => $film->release_date,
                'url' => $film->url,
                'created_at' => $film->created,
                'updated_at' => $film->edited
            ];
        }

        $this->filmRepository->insert($films);
    }
}
