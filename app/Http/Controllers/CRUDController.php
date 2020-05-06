<?php
namespace App\Http\Controllers;

use App\Traits\ControllerAction;
use App\Traits\ControllerCRUD;

class CRUDController extends Controller {
    use ControllerAction, ControllerCRUD;
}