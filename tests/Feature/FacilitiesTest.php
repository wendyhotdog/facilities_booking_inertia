<?php

namespace Tests\Feature;

use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\User;
use Database\Seeders\InitialSetupSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FacilitiesTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(InitialSetupSeeder::class);
    }
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
        $this->withoutExceptionHandling();
        $this->actingAs($user = User::factory()->create());
        $user->assignRole('admin');
        $facilityType = FacilityType::factory()->create();
        $facility = Facility::factory()->make(['facility_type_id' => $facilityType->id]);
        $this->post('/facilities', $facility->toArray());
        $this->assertDatabaseHas('facilities', $facility->toArray());
    }
}
