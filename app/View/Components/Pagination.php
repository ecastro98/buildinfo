<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $page;
    public $pagesCount;
    public $googleHistoryUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page, $pagesCount, $googleHistoryUrl)
    {
        $this->page = $page;
        $this->pagesCount = $pagesCount;
        $this->googleHistoryUrl = $googleHistoryUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
