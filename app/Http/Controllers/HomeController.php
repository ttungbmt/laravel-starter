<?php
namespace App\Http\Controllers;

use Geoserver;

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
//        {"@key":"dbtype","$":"postgis"},
//        {"@key":"host","$":"{{host}}"},
//        {"@key":"port","$":"{{port}}"},
//        {"@key":"database","$":"{{database}}"},
//        {"@key":"user","$":"{{user}}"},
//        {"@key":"passwd","$":"{{passwd}}"},
//        {"@key":"Expose primary keys","$":true}

        $geoserver = GeoServer::layer('hc_tinh');
        dd($geoserver);

        return view('home');
    }


}
