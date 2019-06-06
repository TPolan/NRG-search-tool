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
