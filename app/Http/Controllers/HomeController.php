<?php

namespace App\Http\Controllers;

use App\GeoFile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $model = GeoFile::first();
        return view('home', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|email']);
    }
}
