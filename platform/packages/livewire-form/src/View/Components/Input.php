<?php
namespace ttungbmt\Livewire\Form\View\Components;

class Input extends Field
{
    public function __construct($label = null, $name = null, $prepend = null, $append = null, $wBind = null)
    {
        $this->initField($wBind, $label, $name);
    }

    public function render()
    {
        return view('livewire-form::fields.input');
    }
}
