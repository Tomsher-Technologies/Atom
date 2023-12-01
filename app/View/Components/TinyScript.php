<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TinyScript extends Component
{
    public $editors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($editors)
    {
        $this->editors = $editors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tiny-script');
    }
}
