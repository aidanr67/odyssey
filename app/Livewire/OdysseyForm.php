<?php

namespace App\Livewire;

use App\Support\Facades\OdysseyService;
use Livewire\Component;

class OdysseyForm extends Component
{
    public string $page;

    public function render()
    {
        return view('livewire.odyssey-form');
    }

    public function updatePage()
    {
        $this->page = OdysseyService::fetchRandomOdysseyPage();
    }
}
