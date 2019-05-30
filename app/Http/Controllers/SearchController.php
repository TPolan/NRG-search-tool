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


        $results = DB::table('tracks')->select('external_track_id', 'duration', 'isrc_country_code', 'isrc_registrant_code', 'isrc_year', 'isrc_ident', 'person_interprets', 'tracks.external_album_id', 'albums.release_year')
            ->selectRaw('tracks.name as trackName')
            ->selectRaw('albums.name as albumName')
            ->selectRaw('labels.name as labelName')
            ->selectRaw('tracks.tag_instruments as instruments')
            ->join('albums', 'tracks.external_album_id', '=', 'albums.external_album_id')
            ->join('labels', 'tracks.external_album_id', '=', 'labels.external_id')
            ->where('person_interprets', 'like', '%' . $request->name . '%')
            ->get();


        $show = view("layouts.show", compact('results'));
        return $show->withRequest($request);
    }
}
