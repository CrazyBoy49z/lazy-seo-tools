<?php

namespace Step2dev\LazySeoTools\View\Components;

use Illuminate\View\Component;

class TitleComponent extends Component
{
    public $title;

    public function __construct($title = null)
    {
        $this->title = $title ?? config('app.name');
    }

    public function render()
    {
        return view('lazy-seo::components.title');
    }
}
