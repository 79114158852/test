<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Guide;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookingTest extends TestCase
{
    use DatabaseTransactions;

    public function test_booking_create_wrong_data_response(): void
    {
        $response = $this->postJson('/api/bookings');
        $response->assertUnprocessable();
    }

    public function test_booking_create_success_response(): void
    {
        $guide = Guide::factory()->create();
        $response = $this->postJson(
            '/api/bookings',
            [
                'guide_id' => $guide->id,
                'tour_name' => fake()->name(),
                'hunter_name' => fake()->name(),
                'participants_count' => rand(0,10),
                'date' => fake()->date()
            ]
        );
        $response->assertCreated();
        $response->assertJson(fn (AssertableJson $json) => $json->has('data', fn (AssertableJson $json) => $json
                ->whereType('id', 'integer')
                ->whereType('tour_name', 'string')
                ->whereType('participants_count', 'integer')
                ->whereType('hunter_name', 'string')
                ->whereType('guide', 'array')
                ->whereType('date', 'string')
            )
        );
    }

    public function test_booking_create_wrong_date_response(): void
    {
        # Создадим бронирование для будущего триггера ошибки
        $guide = Guide::factory()->create();
        $date = fake()->date();
        $data = [
            'guide_id' => $guide->id,
            'tour_name' => fake()->name(),
            'hunter_name' => fake()->name(),
            'participants_count' => rand(0,10),
            'date' => $date
        ];
        $response = $this->postJson('/api/bookings', $data);
        $response->assertCreated();

        # Попытаемся создать новое бронирование на туже дату с тем же гидом
        $data = [
            'guide_id' => $guide->id,
            'tour_name' => fake()->name(),
            'hunter_name' => fake()->name(),
            'participants_count' => rand(0,10),
            'date' => $date
        ];
        $response = $this->postJson('/api/bookings', $data);
        $response->assertUnprocessable();
    }
}
