<?php
namespace App\Actions;

class DestroyAction extends CRUDAction {

    public function response($id) {
        $model = $this->findModel($id);
//        $model->delete();
        return redirect($this->getRedirectPage('destroy'));
    }
}
