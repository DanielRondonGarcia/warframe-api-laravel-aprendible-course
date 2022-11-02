<?php

namespace Tests\Feature;

use App\Models\Warframe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Util\Test;
use Tests\TestCase;

class WarframeApiTest extends TestCase
{

    use RefreshDatabase;
    /** @test */
    function api_works()
    {
        $response = $this->get('/api/warframes');
        $response->assertStatus(200);
    }

    /** @test */
    function can_get_all_warframes()
    {
        $warframes = Warframe::factory(4)->create();

        dd($warframes);
    }


}
