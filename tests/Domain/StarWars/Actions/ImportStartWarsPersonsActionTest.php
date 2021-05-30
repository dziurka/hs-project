<?php

namespace Tests\Domain\StarWars\Actions;

use Domain\StarWars\Actions\IImportStartWarsPersonsAction;
use Domain\StarWars\Models\Film;
use Domain\StarWars\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ImportStartWarsPersonsActionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @note quick simple test. Can be expanded by mocking dependencies
     */
    public function test_import_star_wars_persons()
    {
        /** @var IImportStartWarsPersonsAction $importStartWarsPersons */
        $importStartWarsPersons = app(IImportStartWarsPersonsAction::class);
        $importStartWarsPersons->execute();

        $personsCount = Person::query()->count();
        $filmsCount = Film::query()->count();
        $filmPersonsCount = DB::table('film_person')->count();

        $this->assertTrue($personsCount > 0);
        $this->assertTrue($filmsCount > 0);
        $this->assertTrue($filmPersonsCount > 0);
    }
}
