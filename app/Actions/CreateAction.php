<?php
namespace App\Actions;

class CreateAction extends CRUDAction
{
    public $view = 'form';

    public function response() {
        $model = new $this->modelClass;
        return view($this->view, compact('model'));
    }
}
