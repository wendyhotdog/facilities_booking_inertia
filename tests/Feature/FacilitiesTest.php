<?php

namespace Tests\Feature;

use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\User;
use Database\Seeders\InitialSetupSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FacilitiesTest extends TestCase
{
    use RefreshDatabase;
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
        $this->withoutMiddleware();
        $this->actingAs($user = User::factory()->create());
        $user->assignRole('admin');
        $facilityType = FacilityType::factory()->create();
        $facility = Facility::factory()->make(['facility_type_id' => $facilityType->id]);
        $this->post('/facilities', $facility->toArray());
        $this->assertDatabaseHas('facilities', $facility->toArray());
    }

    public function testAuthorizedUsersCanEditFacility()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();
        $this->actingAs($user = User::factory()->create());
        $user->assignRole('admin');
        $facilityType = FacilityType::factory()->create();
        $facilityUpdate = Facility::factory()->make(['facility_type_id' => $facilityType->id]);
        $facility = Facility::factory()->create(['facility_type_id' => $facilityType->id]);
        $this->post('/facilities/' . $facility->id, $facilityUpdate->toArray());
        $this->assertDatabaseHas('facilities', $facilityUpdate->toArray());
    }

    public function testAuthorizedUsersCanDeleteFacility()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();
        $this->actingAs($user = User::factory()->create());
        $user->assignRole('admin');
        $facilityType = FacilityType::factory()->create();
        $facility = Facility::factory()->create(['facility_type_id' => $facilityType->id]);
        $this->delete('/facilities/' . $facility->id);
        $this->assertDatabaseMissing('facilities', $facility->toArray());
    }
}
