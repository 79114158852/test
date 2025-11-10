<?php

namespace Tests\Feature;

use App\Models\Guide;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GuideTest extends TestCase
{
    use DatabaseTransactions;

    public function test_guide_list_successful_response(): void
    {
        Guide::factory()->create();
        $response = $this->getJson('/api/guides');
        $response->assertJson(fn (AssertableJson $json) => $json->has('data.0', fn (AssertableJson $json) => $json
            ->whereType('id', 'integer')
            ->whereType('name', 'string')
            ->whereType('experience_years', 'integer')
            ->whereType('is_active', 'boolean')
        )
        );
        $response->assertOk();
    }
}
