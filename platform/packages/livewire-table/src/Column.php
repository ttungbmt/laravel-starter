<?php
namespace ttungbmt\Livewire\Table;

class Column extends \Yajra\DataTables\Html\Column {
    public function __construct(array $attributes = []) {
        $attributes['view'] = isset($attributes['view']) ? $attributes['view'] : '';
        $attributes['sortCallback'] = isset($attributes['sortCallback']) ? $attributes['sortCallback'] : null;
        $attributes['searchable'] = isset($attributes['searchable']) ? $attributes['searchable'] : false;

        parent::__construct($attributes);
    }

    public function __get($key) {
        if($key === 'attribute') return parent::__get('name');

        return parent::__get($key);
    }


    public function view($view)
    {
        $this->attributes['view'] = $view;

        return $this;
    }

    public function sortable(bool $flag = true)
    {
        $this->attributes['orderable'] = $flag;
        return $this;
    }

    public function sortUsing(callable $callback)
    {
        $this->attributes['sortCallback'] = $callback;
        return $this;
    }
}