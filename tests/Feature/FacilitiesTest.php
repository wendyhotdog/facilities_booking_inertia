<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FacilitiesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanViewFacilitiesPage()
    {
        $response = $this->get('/facilities');

        $response->assertStatus(200);
    }

    public function testAuthorizedUsersCanAddFacilities()
    {
    }
}
