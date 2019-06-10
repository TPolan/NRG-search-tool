<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <title>NRG Repertoire Search</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">NRG Repertoire Search</h1>
        <form method="get" action="{{action('SearchController@show')}}">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Artist Name:</label>
                <input type="text" class="form-control" name="name" id="name" >

                <label for="formGroupExampleInput2">Exclude:</label>
                <input type="text" class="form-control" id="exclude" name="exclude">

                <button class="btn btn-primary btn-lg" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

<table class="table" id="table">
    <thead>
    <tr>
        <th>Track -ID</th>
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
</body>
</html>
