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

    /**
     * Given a book value in the database
     * When calling the UpdatePage method
     * It should get a new page from the model and set the page and page number.
     *
     * @test
     * @small
     */
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
            ->assertSet('pageNumber', 1)
            ->assertSet('context', '');
    }

    /**
     * When getContext is called it should call the service
     * And set the context property with the result.
     *
     * @test
     * @small
     */
    function can_get_context()
    {
        OdysseyService::shouldReceive('fetchPassageContext')
            ->withAnyArgs()
            ->andReturn('test context');

        Livewire::test(OdysseyForm::class)
            ->call('getContext')
            ->assertSet('context', 'test context');
    }
}
