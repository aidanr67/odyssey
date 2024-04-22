<?php
namespace App\Services;

use App\External\ChatGpt\ChatGptClient;
use App\Models\OdysseyBook;
use App\Models\OdysseyBookMetadata;
use Illuminate\Support\Facades\App;

/**
 * Class OdysseyService
 *
 * @package App\Services
 */
class OdysseyService {

    const QUERY_PREFIX = "provide context around this page of Homer's Odyssey";

    /**
     * Fetches a random page from the odyssey book DB table.
     *
     * @return OdysseyBook
     */
    public function fetchRandomOdysseyPage(): OdysseyBook
    {
        $maxPageNum = OdysseyBookMetadata::where('key', 'num_pages')->firstOrFail()->value;
        $randomPageNum = mt_rand(1, $maxPageNum);

        return OdysseyBook::where('page_number', $randomPageNum)->firstOrFail();
    }

    /**
     * Gets context around a provided passage from ChatGPT.
     *
     * @param string $passage
     *
     * @return string
     */
    public function fetchPassageContext(string $passage): string
    {
        return App::make(ChatGptClient::class)
            ->query(self::QUERY_PREFIX . "\n{$passage}");
    }
}
