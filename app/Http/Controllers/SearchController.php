<?php

namespace App\Http\Controllers;

use app\helpers;
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

        function createSearch($searchedName)
        {
            $finalSearch = '';
            $searchedNameArr = str_split($searchedName);
            if (in_array(',', $searchedNameArr)) {
                $searchedNameArr = array_diff($searchedNameArr, array(','));
                $searchedNameArr = implode($searchedNameArr);
                $searchedNameArr = explode(' ', $searchedNameArr);
                $finalSearch = array();
                foreach ($searchedNameArr as $item)
                    array_push($finalSearch, "%" . $item . "%");

            } elseif (in_array('"', $searchedNameArr)) {
                $searchedNameArr = array_diff($searchedNameArr, array('"'));
                $searchedNameArr = implode($searchedNameArr);
                $finalSearch = "%" . $searchedNameArr . "%";
            } else {
                $searchedNameArr = explode(' ', $searchedName);

                foreach ($searchedNameArr as $i) {
                    $finalSearch .= "%" . $i;
                }
                $finalSearch .= "%";
            }

            return $finalSearch;
        }

        $finalSearch = createSearch($request->name);
        $excludeSearch = createSearch($request->exclude);

        if (is_array($finalSearch)) {
            $results = DB::table('tracks')->select('external_track_id', 'duration', 'isrc_country_code', 'isrc_registrant_code', 'isrc_year', 'isrc_ident', 'person_interprets', 'tracks.external_album_id', 'albums.code', 'albums.release_year')
                ->selectRaw('tracks.name as trackName')
                ->selectRaw('albums.name as albumName')
                ->selectRaw('labels.name as labelName')
                ->selectRaw('tracks.tag_instruments as instruments')
                ->join('albums', 'tracks.external_album_id', '=', 'albums.external_album_id')
                ->join('labels', 'tracks.external_album_id', '=', 'labels.external_id')
                ->where([['person_interprets', 'like', $finalSearch[0]], ['person_interprets', 'not like', $request->exclude ? $excludeSearch : '']])
                ->orWhere([['person_interprets', 'like', $finalSearch[1]], ['person_interprets', 'not like', $request->exclude ? $excludeSearch : '']])
                ->get();
        } else {
            $results = DB::table('tracks')->select('external_track_id', 'duration', 'isrc_country_code', 'isrc_registrant_code', 'isrc_year', 'isrc_ident', 'person_interprets', 'tracks.external_album_id', 'albums.code', 'albums.release_year')
                ->selectRaw('tracks.name as trackName')
                ->selectRaw('albums.name as albumName')
                ->selectRaw('labels.name as labelName')
                ->selectRaw('tracks.tag_instruments as instruments')
                ->join('albums', 'tracks.external_album_id', '=', 'albums.external_album_id')
                ->join('labels', 'tracks.external_album_id', '=', 'labels.external_id')
                ->where([['person_interprets', 'like', $finalSearch], ['person_interprets', 'not like', $request->exclude ? $excludeSearch : '']])
                ->get();
        }


        $show = view("layouts.show", compact('results', 'finalSearch', 'excludeSearch'));
        return $show->withRequest($request);
    }
}
