<?php

namespace Tests\Feature;

use Database\Seeders\InitialSetupSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(InitialSetupSeeder::class);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanMakeReservation()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($user = \App\Models\User::factory()->create());
        $facility = \App\Models\Facility::factory()->create();
        $reservation = \App\Models\Reservation::factory()->make([
            'facility_id' => $facility->id,
            'user_id' => $user->id
        ]);
        $this->post('/reservations', $reservation->toArray());
        $this->assertDatabaseHas('reservations', $reservation->toArray());
    }

    public function testUserCannotBookAlreadyBookedSlot()
    {
        $this->withoutExceptionHandling();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $facility = \App\Models\Facility::factory()->create();
        $reservation = \App\Models\Reservation::factory()->create([
            'facility_id' => $facility->id,
            'user_id' => $user->id,
        ]);
        $reservation2 = \App\Models\Reservation::factory()->make([
            'facility_id' => $facility->id,
            'user_id' => $user->id,
            'start_time' => $reservation->start_time,
            'reservation_date' => $reservation->reservation_date,
        ]);
        $this->post('/reservations', $reservation2->toArray())
            ->assertStatus(302);
        $this->assertDatabaseMissing('reservations', $reservation2->toArray());
    }

    public function testUesrCanViewSpecificReservation()
    {
        $this->withoutExceptionHandling();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $reservation = \App\Models\Reservation::factory()->create([
            'user_id' => $user->id,
        ]);
        $this->get('/reservations/' . $reservation->id)
            ->assertStatus(200);
    }

    public function testUsersCanCancelTheirResrvations()
    {
        $this->withoutExceptionHandling();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $reservation = \App\Models\Reservation::factory()->create([
            'user_id' => $user->id,
        ]);
        $this->post(route('reservations.cancel', $reservation->id))
            ->assertStatus(302);
        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
            'status' => \App\Enums\ReservationStatusEnums::CANCELLED
        ]);
    }
    public function testUserCanViewBookingsMade()
    {
        $this->withoutExceptionHandling();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $reservation = \App\Models\Reservation::factory()->create([
            'user_id' => $user->id,
        ]);
        $this->get(route('reservations.index'))
            ->assertStatus(200);
    }
}
