<?php
namespace ttungbmt\Livewire\Form;

class FormComponent extends \Kdion4891\LaravelLivewireForms\FormComponent {
    public function formView()
    {
        return view('livewire-form::form', [
            'fields' => $this->fields(),
        ]);
    }
}