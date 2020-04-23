<?php

namespace App\View\Components;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\ComponentAttributeBag;
use Str;

class FieldInput extends Field
{
    public $append;
    public $prepend;

    public function __construct($label = null, $name = null, $prepend = null, $append = null, $model = null)
    {
        $this->label = $label;
        $this->name = $name ? $name : '';
        $this->prepend = $prepend;
        $this->append = $append;
    }

    public function render()
    {
        return view('components.field-input');
    }


    public function getAttrs(ComponentAttributeBag $attrs, ViewErrorBag $errors)
    {
        $invalid = $errors->has('v.'.$this->name) ? 'is-invalid' : '';

        $attrs = $attrs
            ->merge([
            'class' => (string)Str::of('form-control')->append(" {$invalid}")->trim(),
            'name' => $this->name,
        ]);

        if($attrs->get('w-model')){
            $attrs = $attrs->merge(['wire:model.lazy' => $attrs->get('w-model')])->except(['w-model']);

        }

        return $attrs;
    }
}
