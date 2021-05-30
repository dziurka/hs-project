<?php

namespace Domain\StarWars\Actions;

use Domain\StarWars\Repositories\IFilmRepository;
use Domain\StarWars\Repositories\IPersonRepository;
use Domain\StarWars\Repositories\Swapi\ISwapiPersonRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

class ImportStartWarsPersonsAction implements IImportStartWarsPersonsAction
{
    private const IMPORT_CHUNK_SIZE = 50;
    private Collection $films;

    public function __construct(
        private ISwapiPersonRepository $swapiPersonRepository,
        private IPersonRepository $personRepository,
        private IImportStartWarsFilmsAction $importStartWarsFilms,
        private IFilmRepository $filmRepository,
    )
    {
        //
    }

    public function execute(int $amount = null, $deletePrevious = true): void
    {
        $this->deletePreviousPersonsAndFilms($deletePrevious);
        $this->importStartWarsFilms->execute();
        $this->films = $this->filmRepository->all()->mapToURLKeys();

        $this->swapiPersonRepository->getPersons()->values()
            ->when($amount !== null, function (LazyCollection $persons) use ($amount) {
                return $persons->take($amount);
            })
            ->chunk(self::IMPORT_CHUNK_SIZE)
            ->each([$this, 'generatePersons']);
    }

    public function generatePersons(LazyCollection $persons): void
    {
        $filmsIdsByPersonIds = collect();

        $personsToSave = $persons->map(function (object $person) use (&$filmsIdsByPersonIds) {
            $personAttrs = $this->mapPersonObjectToModelAttributes($person);
            $filmsIdsByPersonIds = $filmsIdsByPersonIds->merge(
                $this->createFilmsPersonPivots($person->films, $personAttrs['id'])
            );
            return $personAttrs;
        });

        $this->personRepository->insert($personsToSave->toArray());
        $this->personRepository->insertAttachedFilms($filmsIdsByPersonIds->toArray());
    }

    private function createFilmsPersonPivots(array $films, string $personId): array
    {
        return collect($films)->map(function ($film) use ($personId) {
            return [
                'person_id' => $personId,
                'film_id' => $this->films[$film]->id
            ];
        })->toArray();
    }

    private function mapPersonObjectToModelAttributes(object $person): array
    {
        return [
            'id' => Str::orderedUuid()->toString(),
            'name' => $this->convertToNull($person->name),
            'height' => $this->convertToNull($this->convertToInt($person->height)),
            'mass' => $this->convertToNull($this->convertToInt($person->mass)),
            'hair_color' => $this->convertToNull($person->hair_color),
            'skin_color' => $this->convertToNull($person->skin_color),
            'eye_color' => $this->convertToNull($person->eye_color),
            'birth_year' => $this->convertToNull($person->birth_year),
            'gender' => $this->convertToNull($person->gender),
            'created_at' => $person->created,
            'updated_at' => $person->edited,
        ];
    }

    private function convertToNull(string $value): ?string
    {
        return in_array($value, ['n/a', 'unknown']) ? null : $value;
    }

    private function convertToInt(string $value): int
    {
        return (int)str_replace(',', '', $value);
    }

    private function deletePreviousPersonsAndFilms($delete = true): void
    {
        if (!$delete) {
            return;
        }

        $this->personRepository->deleteAll();
        $this->filmRepository->deleteAll();
    }
}
