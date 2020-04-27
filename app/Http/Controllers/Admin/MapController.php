<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MapController extends Controller
{
    public function index(){
        return view('admin.map.index');
    }
}
