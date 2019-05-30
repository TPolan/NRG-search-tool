<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <title>NRG Repertoire Search</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" >

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">NRG Repertoire Search</h1>
            <form method="get" action="{{action('SearchController@show')}}">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Artist Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$request->name}}">

                    <label for="formGroupExampleInput2">Exclude:</label>
                    <input type="text" class="form-control" id="exclude" name="exclude" value="">

                    <button class="btn btn-primary btn-lg" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>


    @if ($results == null)
        <h2>"No result"</h2>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>Track  -ID</th>
                <th>Track - Artist Name</th>
                <th>Track - Name</th>
                <th>Track - All Artists</th>
                <th>Track - Other Artists</th>
                <th>Track - Instruments</th>
                <th>Track - Number of Artists</th>
                <th>Track - Artists Share</th>
                <th>Track - Duration</th>
                <th>Track - ISRC</th>
                <th>Album - Name</th>
                <th>Album - Code</th>
                <th>Album - Release Year</th>
                <th>Label - Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{$result->external_track_id}}</td>
                    <td>{{$result->person_interprets}}</td>
                    <td>{{$result->trackName}}</td>
                    <td>{{$result->person_interprets}}</td>
                    <td>Track - Other Artists</td>
                    <td>{{$result->instruments}}</td>
                    <td>{{countArtists($result->person_interprets)}}</td>
                    <td>{{artistShare(countArtists($result->person_interprets)) . '%'}}</td>
                    <td>{{$result->duration}}</td>
                    <td>{{$result->isrc_country_code . $result->isrc_registrant_code . $result->isrc_year . $result->isrc_ident}}</td>
                    <td>{{$result->albumName}}</td>
                    <td>{{$result->external_album_id}}</td>
                    <td>{{$result->release_year}}</td>
                    <td>{{$result->labelName}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>


</body>
</html>

