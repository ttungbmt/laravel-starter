<?php
namespace App\Actions;

use Illuminate\Http\Request;

class SaveAction extends CRUDAction
{
    public $view = '';

    public function response($id = null) {

        return redirect($this->getRedirectPage($id ? 'update' : 'store'));
    }
}
