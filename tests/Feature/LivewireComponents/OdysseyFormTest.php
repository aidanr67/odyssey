<?php

namespace Tests\Feature\Livewire;

use App\Livewire\OdysseyForm;
use App\Support\Facades\OdysseyService;
use Livewire\Livewire;
use Tests\TestCase;

class OdysseyFormTest extends TestCase
{
    /** @test */
    function can_set_initial_title()
    {
        Livewire::test(OdysseyForm::class, ['page' => 'first'])
            ->assertSet('page', 'first');
    }

    /** @test */
    function can_update_page_text()
    {
        OdysseyService::shouldReceive('fetchRandomOdysseyPage')
            ->withNoArgs()
            ->andReturn('test');

        Livewire::test(OdysseyForm::class)
            ->call('updatePage')
            ->assertSet('page', 'test');
    }
}
