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


        function countArtists($artists)
        {
            $nArtists = explode(",", $artists);

            return count($nArtists);
        }

        function artistShare($nOfArtists)
        {
            return floor(100 / $nOfArtists);
        }


        $results = DB::table('tracks')->select('external_track_id', 'duration', 'isrc_country_code', 'isrc_registrant_code', 'isrc_year', 'isrc_ident', 'person_interprets', 'tracks.external_album_id', 'albums.release_year')
            ->selectRaw('tracks.name as trackName')->selectRaw('albums.name as albumName')
            ->join('albums', 'tracks.external_album_id', '=', 'albums.external_album_id')
            ->where('person_interprets', 'like', '%' . $request->name . '%')
            ->get();

        $numOfArtists = countArtists('Marcellus Lewis,Michael Wellman');
        $artistsShare = artistShare($numOfArtists);

        $show = view("layouts.show", compact('results','numOfArtists', 'artistsShare' ));
        return $show->withRequest($request);
    }
}
