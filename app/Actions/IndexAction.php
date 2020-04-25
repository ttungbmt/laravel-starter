<?php
namespace App\Actions;

class IndexAction extends CRUDAction
{
    public $view = 'index';

    public function response() {
        $models = $this->modelClass::all();
        return view($this->view, compact('models'));
    }
}
