<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

        $search = view("layouts.search");
        return $search;
    }

    public function show()
    {
        $count = 0;
        $results = [
            [
                'name' => 'Tonda',
                'surname' => 'Lojza'
            ],
            [
                'name' => 'Karel',
                'surname' => 'Borov'
            ]
        ];
        $show = view("layouts.show", compact('results', 'count'));
        return $show;
    }
}
