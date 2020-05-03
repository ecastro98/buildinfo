<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Revisions extends Component
{
    public $revisions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($revisions)
    {
        $this->revisions = $revisions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.revisions');
    }
}
