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

function stripCharsFromArray ($fromArray,$charToStrip)
{
    $fromArray = array_splice($fromArray, array_search($charToStrip, $fromArray));
    $fromArray = implode('', $fromArray);

    return $fromArray;
}
