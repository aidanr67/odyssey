<?php
namespace App\Services;

use App\Models\OdysseyBook;
use App\Models\OdysseyBookMetadata;

/**
 * Class OdysseyService
 */
class OdysseyService {

    /**
     * Fetches a random page from the odyssey book DB table.
     *
     * @return string
     */
    public function fetchRandomOdysseyPage(): string
    {
        $maxPageNum = OdysseyBookMetadata::where('key', 'num_pages')->firstOrFail()->value;
        $randomPageNum = mt_rand(1, $maxPageNum);

        return OdysseyBook::where('page_number', $randomPageNum)->firstOrFail()->content;
    }
}
