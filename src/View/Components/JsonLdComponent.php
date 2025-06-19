<?php

namespace Step2dev\LazySeoTools\View\Components;

use Illuminate\View\Component;

class JsonLdComponent extends Component
{
    public function render()
    {
        return view('lazy-seo::components.jsonld');
    }
}
