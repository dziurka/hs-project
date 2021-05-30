<?php

namespace Tests\App\API\StarWars;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\Domain\User\Factories\UserFactory;
use Tests\TestCase;

/**
 * Class PeopleIndexTest
 * @package Tests\App\API\StarWars
 * @todo extend test
 */
class PeopleIndexTest extends TestCase
{
    use RefreshDatabase;

    private const PEOPLE_INDEX_ENDPOINT = 'api/v1/sw/people';

    public function test_people_index()
    {
        $user = UserFactory::new()->create();
        $this->actingAs($user, 'sanctum');
        $res = $this->get(self::PEOPLE_INDEX_ENDPOINT);
        $this->assertTrue($res->status() === Response::HTTP_OK);
    }
}
