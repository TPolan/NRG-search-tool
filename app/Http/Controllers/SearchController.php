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
                $searchedNameArr = stripCharsFromArray($searchedNameArr, ',');
                $searchedNameArr = explode(" ", $searchedNameArr);

                foreach ($searchedNameArr as $i) {
                    $finalSearch .= "%" . $i . "% OR";
                }
            } elseif (in_array('"', $searchedNameArr)) {
                $searchedNameArr = stripCharsFromArray($searchedNameArr, '"');
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

        $seeSearch = createSearch($request->name);

        $results = DB::table('tracks')->select('external_track_id', 'duration', 'isrc_country_code', 'isrc_registrant_code', 'isrc_year', 'isrc_ident', 'person_interprets', 'tracks.external_album_id', 'albums.code', 'albums.release_year')
            ->selectRaw('tracks.name as trackName')
            ->selectRaw('albums.name as albumName')
            ->selectRaw('labels.name as labelName')
            ->selectRaw('tracks.tag_instruments as instruments')
            ->join('albums', 'tracks.external_album_id', '=', 'albums.external_album_id')
            ->join('labels', 'tracks.external_album_id', '=', 'labels.external_id')
            ->where('person_interprets', 'like', createSearch($request->name))
            ->get();


        $show = view("layouts.show", compact('results', 'seeSearch'));
        return $show->withRequest($request);
    }
}
