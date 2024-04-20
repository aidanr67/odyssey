<?php

namespace App\Http\Controllers;

use App\Support\Facades\OdysseyService;
use Illuminate\View\View;


class OdysseyHomeController extends Controller
{
    /**
     * Show odyssey home page.
     *
     * @returns View
     */
    public function show() {

        return view('odyssey_home', ['page' => OdysseyService::fetchRandomOdysseyPage()]);
    }
}
