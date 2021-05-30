<?php

namespace Tests\App;

use Tests\TestCase;

class ApiRespondingTest extends TestCase
{
    public function testBasicTest(): void
    {
        $response = $this->get('/api/v1/echo');

        $response->assertStatus(200)
            ->assertJson([]);
    }
}
