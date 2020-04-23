<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $isOpen = false;

    public function __construct($isOpen = false)
    {
        $this->isOpen = filter_var($isOpen, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
