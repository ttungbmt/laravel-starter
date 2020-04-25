<?php

namespace App\Http\Controllers;


use App\GeoFile;
use App\GeoFileManager;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;



class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
//        $node = GeoFileManager::create([
//            'name' => '4',
//            'children' => [
//                [
//                    'name' => '5',
//                    'children' => [
//                        [
//                            'name' => '6'
//                        ],
//                    ],
//                ],
//            ],
//        ]);

//        $node = GeoFileManager::withDepth()->having('depth', '=', 1)->get()->toTree()->first();
        $node = GeoFileManager::with(['file'])->descendantsAndSelf(1)->toTree()->toArray();
        dd($node);
        return view('home');
    }


}
