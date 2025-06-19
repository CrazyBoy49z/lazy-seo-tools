<?php

namespace Step2dev\LazySeoTools\Http\Livewire;

use Livewire\Component;
use Step2dev\LazySeoTools\Models\SeoRedirect;

class RedirectTable extends Component
{
    public function render()
    {
        return view('lazy-seo::livewire.redirect-table', [
            'redirects' => SeoRedirect::latest()->paginate(10),
        ]);
    }
}
