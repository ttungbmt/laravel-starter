<?php
namespace ttungbmt\Livewire\Form\Fields;

class Field extends \Yajra\DataTables\Html\Editor\Fields\Field {
    protected $key;
    protected $rules;
    protected $array_sortable = false;
    protected $view;

    public function __get($key) {
        if(property_exists ($this, $key)) return $this->{$key};

        return parent::__get($key);
    }

    public function className($className){
        $this->attributes['class'] = $className;
        return $this;
    }

    public static function make($label = '', $name = '') {
        $parent = parent::make($name, $label);
        $parent->key = 'form.'.$name;

        return $parent;
    }

    public function placeholder($placeholder)
    {
        $this->attributes['placeholder'] = $placeholder;
        return $this;
    }

    public function help($help)
    {
        $this->attributes['help'] = $help;
        return $this;
    }

    public function autocomplete($autocomplete)
    {
        $this->attributes['autocomplete'] = $autocomplete;
        return $this;
    }

    public function sortable()
    {
        $this->array_sortable = true;
        return $this;
    }

    public function rules($rules)
    {
        $this->rules = $rules;
        return $this;
    }

    public function view($view)
    {
        $this->view = $view;
        return $this;
    }
}