<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){

    $search = view("layouts.search");
    return $search;
    }

}
