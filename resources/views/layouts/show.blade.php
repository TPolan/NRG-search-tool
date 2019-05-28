<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <title>NRG Search Tool</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" >

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">NRG Repertoire </h1>
            <form method="get" action="{{action('SearchController@show')}}">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Artist Name:</label>
                    <input type="text" class="form-control" name="name" id="name">

                    <label for="formGroupExampleInput2">Exclude:</label>
                    <input type="text" class="form-control" id="exclude" name="exclude">

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
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <th scope="row">{{1}}</th>
                    <td>{{$result['name']}}</td>
                    <td>{{$result['surname']}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>


</body>
</html>

