<?php
namespace App\Http\Controllers\Admin;

use App\GeoFile;
use App\Http\Controllers\CRUDController;

class GeoFileController extends CRUDController {

    public $modelClass = GeoFile::class;

    public function actions() {
        return ['index', 'show', 'create', 'edit', 'store', 'update', 'destroy'];
    }
}
