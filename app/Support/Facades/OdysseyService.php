<?php
namespace App\Support\Facades;

use App\Services\OdysseyService as Service;
use Illuminate\Support\Facades\Facade;

/**
 * Class OdysseyService
 *
 * @package App\Support\Facades
 *
 * @see App\Services\OdysseyService
 *
 * @method static fetchRandomOdysseyPage
 */
class OdysseyService extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Service::class;
    }
}
