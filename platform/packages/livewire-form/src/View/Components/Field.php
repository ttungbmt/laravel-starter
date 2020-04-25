<?php
namespace ttungbmt\Livewire\Form\View\Components;

use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

abstract class Field extends Component
{
    public $id;
    public $field;

    public function initField($wBind, $label, $name){
        $this->id = uniqid('w-');

        if ($wBind instanceof \ttungbmt\Livewire\Form\Fields\Field) {
            $this->field = $wBind;
        } else {
            $this->field = \ttungbmt\Livewire\Form\Fields\Select::make($label, $name);
        }
    }

    public function getAttrs(ComponentAttributeBag $attrs, ViewErrorBag $errors)
    {
        $field_attrs = ['id', 'name', 'autocomplete'];
        foreach ($field_attrs as $k){
            if($attr = $this->field->{$k}) $attrs = $attrs->merge([$k => $attr]);
        }

        if($attr = $this->field->attr) $attrs = $attrs->merge($attr);

        $className = Str::of($this->field->class)->prepend('form-control ');

        if($errors->has($this->field->key)){
            $className = $className->append(' is-invalid');
        }

        if($model = $attrs->get('w-model')){
            $attrs = $attrs->merge(['wire:model.lazy' => $model])->except(['w-model']);
        }

        $attrs = $attrs->merge([
            'class' => $className,
        ]);

        return $attrs;
    }
}
