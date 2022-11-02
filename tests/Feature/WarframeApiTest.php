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
        $response = $this->get(route('warframes.index'));
        $response->assertStatus(200);
    }

    /** @test */
    function can_get_all_warframes()
    {
        $warframes = Warframe::factory(4)->create();

        $this->get(route('warframes.index'))
        ->assertJsonFragment([
            'name' => $warframes[0]->name,
            'description' => $warframes[0]->description,
        ])->assertJsonFragment([
            'name' => $warframes[1]->name,
            'description' => $warframes[1]->description,
        ])->assertJsonFragment([
            'name' => $warframes[2]->name,
            'description' => $warframes[2]->description,
        ])->assertJsonFragment([
            'name' => $warframes[3]->name,
            'description' => $warframes[3]->description,
        ]);
    }

    /** @test */
    function can_get_one_warframe()
    {
        $warframe = Warframe::factory()->create();

        $this->get(route('warframes.show', $warframe))
        ->assertJsonFragment([
            'name' => $warframe->name,
            'description' => $warframe->description,
        ]);
    }

    /** @test */
    function can_create_warframe()
    {
        $this->postJson(route('warframes.store'),[])
        ->assertJsonValidationErrorFor('name');

        $this->postJson(route('warframes.store'),[
            'name' => 'Test Warframe',
            'description' => 'Test Warframe Description',
            'firstAbility' => 'Test Warframe First Ability',
            'secondAbility' => 'Test Warframe Second Ability',
            'thirdAbility' => 'Test Warframe Third Ability',
            'fourthAbility' => 'Test Warframe Fourth Ability',
            'sex' => 'Test Male',
        ])->assertJsonFragment([
            'name' => 'Test Warframe',
            'description' => 'Test Warframe Description',
            'firstAbility' => 'Test Warframe First Ability',
            'secondAbility' => 'Test Warframe Second Ability',
            'thirdAbility' => 'Test Warframe Third Ability',
            'fourthAbility' => 'Test Warframe Fourth Ability',
            'sex' => 'Test Male',
        ]);

        $this->assertDatabaseHas('warframes', [
            'name' => 'Test Warframe',
            'description' => 'Test Warframe Description',
            'firstAbility' => 'Test Warframe First Ability',
            'secondAbility' => 'Test Warframe Second Ability',
            'thirdAbility' => 'Test Warframe Third Ability',
            'fourthAbility' => 'Test Warframe Fourth Ability',
            'sex' => 'Test Male',
        ]);
    }

    /** @test */
    function can_update_warframe()
    {

        $warframe = Warframe::factory()->create();

        $this->patchJson(route('warframes.update', $warframe),[])
        ->assertJsonValidationErrorFor('name');

        $this->putJson(route('warframes.update', $warframe),[
            'name' => 'Edited Warframe',
            'description' => 'Edited Warframe Description',
            'firstAbility' => 'Edited Warframe First Ability',
            'secondAbility' => 'Edited Warframe Second Ability',
            'thirdAbility' => 'Edited Warframe Third Ability',
            'fourthAbility' => 'Edited Warframe Fourth Ability',
            'sex' => 'Edited Male',
        ]);

        $this->assertDatabaseHas('warframes', [
            'name' => 'Edited Warframe',
            'description' => 'Edited Warframe Description',
            'firstAbility' => 'Edited Warframe First Ability',
            'secondAbility' => 'Edited Warframe Second Ability',
            'thirdAbility' => 'Edited Warframe Third Ability',
            'fourthAbility' => 'Edited Warframe Fourth Ability',
            'sex' => 'Edited Male',
        ]);
    }

    /** @test */
    function can_delete_warframe()
    {
        $warframe = Warframe::factory()->create();

        $this->deleteJson(route('warframes.destroy', $warframe));

        $this->assertDatabaseMissing('warframes', [
            'name' => $warframe->name,
            'description' => $warframe->description,
        ]);
    }
}
