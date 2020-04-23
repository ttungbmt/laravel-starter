<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $method;
    public $summaryErrors ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($method = 'GET', $summaryErrors = null)
    {
        $this->method = $method;
        $this->summaryErrors = $summaryErrors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form', [
            'method' =>  $this->method,
        ]);
    }

    public function getAttrs($attrs){
        $method = $this->isGetOrPost() ? $this->method : 'POST';
        return $attrs->merge(['method' => $method]);
    }

    public function isGetOrPost(){
        return ($this->method == 'POST' || $this->method == 'GET');
    }
}
