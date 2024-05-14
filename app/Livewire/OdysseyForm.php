<?php

namespace App\Livewire;

use App\Support\Facades\OdysseyService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Livewire;

/**
 * Class OdysseyForm
 *
 * @package App\Livewire
 */
class OdysseyForm extends Component
{

    /**
     * Stores the page content.
     *
     * @var string
     */
    public string $page;

    /**
     * Stores context for a given test selection.
     *
     * @var string
     */
    public string $context = '';

    /**
     * Stores the page number.
     *
     * @var string
     */
    public string $pageNumber;

    /**
     * Stores a section of highlighted text.
     *
     * @var string
     */
    public string $highlightedText = '';

    public bool $showError = false;

    /**
     * Render the Livewire blade template.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.odyssey-form');
    }

    /**
     * Updates the page and page number values.
     *
     * @return void
     */
    public function updatePage()
    {
        $page = OdysseyService::fetchRandomOdysseyPage();

        $this->page = $page->content;
        $this->pageNumber = $page->page_number;
        $this->highlightedText = '';
        $this->context = '';
    }

    /**
     * Gets context for a selection of text.
     *
     * @return void
     */
    public function getContext(): void
    {
        if (strlen($this->highlightedText) > 0) {
            $this->showError = false;
            $this->context = OdysseyService::fetchPassageContext($this->highlightedText);
        } else {
            $this->showError = true;
            $this->dispatch('no-highlighted-text');
        }
    }

    #[On('highlighted-text-changed')]
    /**
     * @param $event
     *
     * @return void
     */
    public function handleHighlightedTextChanged($highlightedText)
    {
        $this->highlightedText = $highlightedText;
    }
}
