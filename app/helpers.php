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

