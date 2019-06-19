<?php
function countArtists($artists)
{
    $nArtists = explode(",", $artists);

    return count($nArtists);
};

function artistShare($nOfArtists)
{
    return floor(100 / $nOfArtists);
};

function extractOtherArtists($artists, $mainArtistsName)
{
    $artists = explode(',', $artists);
    $otherArtists = array_diff($artists, array($mainArtistsName));
    $otherArtists = implode(',', $otherArtists);

    return $otherArtists;
};

function extractMainArtist($artists, $mainArtistsName)
{
    $artists = explode(',', $artists);
    /*Mark Allaway
    result Mark David Allaway, Martin Wheatly
    */

    // explode on names by space
    $artistsExploded = array_map(function($name){
        return explode(' ', $name);
    }, $artists);
    // foreach $artists take last string and compare to last string of query, return first matched array


    $mainArtist = array_intersect($artists, array($mainArtistsName));
    $mainArtist = implode(',', $mainArtist);

    return $mainArtist;
};
function stripChars($charToStrip, $stringToStripFrom)
{
    $stringToStripFrom = str_split($stringToStripFrom);
    $stringToStripFrom = array_diff($stringToStripFrom, $charToStrip);
    $stringToStripFrom = implode($stringToStripFrom);
    return $stringToStripFrom;
};
