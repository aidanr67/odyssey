<?php

namespace App\Http\Controllers;

use App\Support\Facades\OdysseyService;
use Illuminate\View\View;


/**
 * Class OdysseyHomeController
 *
 * @package App\http\Controller
 */
class OdysseyHomeController extends Controller
{
    /**
     * Show odyssey home page.
     *
     * @returns View
     */
    public function show() {
        $page = OdysseyService::fetchRandomOdysseyPage();
        return view('odyssey_home', [
            'page' => $page->content,
            'pageNumber' => $page->page_number,
        ]);
    }
}
