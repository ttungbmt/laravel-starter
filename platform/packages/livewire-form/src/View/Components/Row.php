<?php
namespace ttungbmt\Livewire\Form\View\Components;

use Illuminate\View\Component;

class Row extends Component {

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render() {
        return view('livewire-form::row');
    }
}