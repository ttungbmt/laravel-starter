<?php
namespace ttungbmt\Livewire\Form\View\Components;

class Select extends Field {
    public function __construct($label = null, $name = null, $wBind = null) {
        $this->initField($wBind, $label, $name);

    }

    public function render() {
        return view('livewire-form::fields.select');
    }

}
