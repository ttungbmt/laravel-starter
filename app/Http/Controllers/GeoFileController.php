<?php
namespace App\Http\Controllers;

use App\GeoFile;

class GeoFileController extends Controller
{
    public function index(){
        $model = new GeoFile();
        return view('admin.geo-file.form', compact('model'));
//        return redirect()->route('geo_file.form');
    }

    public function show($id)
    {

    }

    public function create()
    {
        $model = new GeoFile();
        return view('admin.geo-file.component', compact('model'));
    }

    public function edit($id)
    {
        //
    }


    public function form(){

    }
}
