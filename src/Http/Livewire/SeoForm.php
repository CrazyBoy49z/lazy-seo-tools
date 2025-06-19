<?php

namespace Step2dev\LazySeoTools\Http\Livewire;

use Livewire\Component;
use Step2dev\LazySeoTools\Models\Seo;

class SeoForm extends Component
{
    public $title, $description, $keywords;

    public function save()
    {
        Seo::create([
            'title' => $this->title,
            'description' => $this->description,
            'keywords' => $this->keywords,
        ]);
    }

    public function render()
    {
        return view('lazy-seo::livewire.seo-form');
    }
}
