<?php

namespace Database\Seeders;

use App\Models\OdysseyBook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\PdfToText\Pdf;

/**
 * Class OdysseyDatabaseSeeder
 *
 * @package Database\Seeders;
 *
 * Pulls text from the PDF book and inserts in into the DB page by page.
 */
class OdysseyDatabaseSeeder extends Seeder
{
    /**
     * Parses the book of Homer's Odyssey and stores each page in the database.
     */
    public function run(): void
    {
        $pathToPdf = storage_path('/pdfs/The_Odyssey_Of_Homer.pdf');
        $pdf = Pdf::getText($pathToPdf);
        // This separator appears at the top of every page.
        $odysseyArray = explode('www.freeclassicebooks.com', $pdf);
        // The first 5 pages are title, index, etc. The last page is blank.
        $odysseyArray = array_slice($odysseyArray, 5, -1);
        $totalPages = count($odysseyArray);
        $processedPages = 0;

        foreach ($odysseyArray as $key => $value) {
            DB::table('odyssey_book')->insert([
                'page_number' => $key,
                'content' => $value,
            ]);
            $processedPages++;
            $percentage = round(($processedPages / $totalPages) * 100, 2);
            echo "{$percentage} complete\n";
        }

        DB::table('odyssey_book_metadata')->insert([
            'key' => 'num_pages',
            'value' => $totalPages,
        ]);
    }
}
