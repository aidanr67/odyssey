<?php

namespace Tests\Feature\Livewire;

use App\Livewire\OdysseyForm;
use App\Models\OdysseyBook;
use App\Support\Facades\OdysseyService;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * Class OdysseyFormTest
 *
 * @package Tests\Feature\Livewire
 *
 * @test
 * @small
 */
class OdysseyFormTest extends TestCase
{
    /** @test */
    function can_set_initial_title()
    {
        Livewire::test(OdysseyForm::class, ['page' => 'first', 'pageNumber' => 1])
            ->assertSet('page', 'first')
            ->assertSet('pageNumber', 1);
    }

    /** @test */
    function can_update_page_text()
    {
        $page = OdysseyBook::make([
            'content' => 'test',
            'page_number' => 1,
        ]);

        OdysseyService::shouldReceive('fetchRandomOdysseyPage')
            ->withNoArgs()
            ->andReturn($page);

        Livewire::test(OdysseyForm::class)
            ->call('updatePage')
            ->assertSet('page', 'test')
            ->assertSet('pageNumber', 1);
    }
}
