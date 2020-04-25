<?php

namespace App\Actions;

class ShowAction extends CRUDAction {
    /**
     * @var string View file name
     */
    public $view = 'show';

    public function response($id) {
        $model = $this->findModel($id);
        return view($this->view, compact('model'));
    }
}
