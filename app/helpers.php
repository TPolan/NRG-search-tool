<?php
function countArtists($artists)
{
    $nArtists = explode(",", $artists);

    return count($nArtists);
}

function artistShare($nOfArtists)
{
    return floor(100 / $nOfArtists);
}

function extractOtherArtists($artists, $mainArtistsName) {
    $artists = explode(',', $artists);
    $artists = array_diff($artists, array($mainArtistsName));
    $artists = implode(',',$artists);

    return $artists ;
}

function stripChars($charToStrip, $stringToStripFrom)
{
    $charToStrip = array($charToStrip);
    $stringToStripFrom = str_split($stringToStripFrom);
    $stringToStripFrom = array_diff($stringToStripFrom,$charToStrip);
    $stringToStripFrom = implode('', $stringToStripFrom);
    return $stringToStripFrom;
}
