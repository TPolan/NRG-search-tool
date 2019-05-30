<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {

        $search = view("layouts.search");
        return $search;
    }

    public function show(Request $request)
    {


//        function createQuery($name) {
//            $search = explode(" ", $name);
//            $searchName = '%';
//            foreach ($search as i) {
//                $searchName += i . '%';
//            }
//            return $searchName;
//        }

        $results = DB::table('tracks')->where('person_interprets','like', '%' . $request->name . '%')->join('albums','tracks.external_album_id','=','albums.external_album_id')->get();

        $show = view("layouts.show", compact('results'));
        return $show->withRequest($request);
    }
}
