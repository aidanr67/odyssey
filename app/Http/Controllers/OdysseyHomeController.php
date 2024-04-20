<?php

namespace App\Http\Controllers;

use App\Models\OdysseyBook;
use App\Models\OdysseyBookMetadata;
use Illuminate\View\View;


class OdysseyHomeController extends Controller
{
    /**
     * Show odyssey home page.
     *
     * @returns View
     */
    public function show() {
        $maxPageNum = OdysseyBookMetadata::where('key', 'num_pages')->firstOrFail()->value;
        $randomPageNum = mt_rand(1, $maxPageNum);

        $pageText = OdysseyBook::where('page_number', $randomPageNum)->firstOrFail()->content;

        return view('odyssey_home', ['pageText' => $pageText]);
    }
}
