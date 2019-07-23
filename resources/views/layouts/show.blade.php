@extends('layouts.app')
@section('content')


    <section class="content-area">
        <div class="container-fluid">
            <div class="" id="fixedHeader">
                <form method="get" action="{{action('SearchController@show')}}">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Artist Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$request->name}}">

                        <label for="formGroupExampleInput2">Exclude:</label>
                        <input type="text" class="form-control" id="exclude" name="exclude"
                               value="{{$request->exclude}}">

                        <button class="btn btn-primary btn-lg" type="submit">Search</button>
                    </div>
                </form>
            </div>

            <table class="table table-striped table-bordered" id="tableData">
                <thead class="sticky-top">
                <tr>
                    <th>ID</th>
                    <th>Artist Name</th>
                    <th>Name</th>
                    <th>All Artists</th>
                    <th>Other Artists</th>
                    <th>Instruments</th>
                    <th>Number of Artists</th>
                    <th>Artists Share</th>
                    <th>Duration</th>
                    <th>ISRC</th>
                    <th>Album Name</th>
                    <th>Album Code</th>
                    <th>Album Release Year</th>
                    <th>Label Name</th>
                    <th>
                        <button id="selectAll">Copy All</button>
                    </th>
                </tr>
                </thead>
                <tbody id="tablebody">
                @foreach($results as $i => $result)
                    <tr class="single_result" id='result{{$i}}'>
                        <td>{{$result->external_track_id}}</td>
                        <td>{{extractMainArtist($result->person_interprets,stripChars(array('"',','),$request->name))}}</td>
                        <td>{{$result->trackName}}</td>
                        <td>{{$result->person_interprets}}</td>
                        <td>{{extractOtherArtists($result->person_interprets,stripChars(array('"',','),$request->name)) ? extractOtherArtists($result->person_interprets,stripChars(array('"',','),$request->name)) : "No other Artists"}}</td>
                        <td>{{$result->instruments}}</td>
                        <td>{{countArtists($result->person_interprets)}}</td>
                        <td>{{artistShare(countArtists($result->person_interprets)) . '%'}}</td>
                        <td>{{$result->duration}}</td>
                        <td>{{$result->isrc_country_code . $result->isrc_registrant_code . $result->isrc_year . $result->isrc_ident}}</td>
                        <td>{{$result->albumName}}</td>
                        <td>{{$result->code}}</td>
                        <td>{{$result->release_year}}</td>
                        <td>{{$result->labelName}}</td>
                        <td>
                            <button class="delete" id={{$i}}>X</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <script>
            const tablebody = document.getElementById('tablebody');

            document.addEventListener('click', (e) => {

                if (e.target.className !== 'delete') return;

                let delButton = e.target.id;
                console.log(`result${e.target.id}`);
                tablebody.removeChild(document.getElementById(`result${e.target.id}`));

            });

            const selectAllButton = document.getElementById('selectAll');
            const table = document.getElementById('tableData');
            const selectElementContents = (el) => {
                let body = document.body, range, sel;
                if (document.createRange && window.getSelection) {
                    range = document.createRange();
                    sel = window.getSelection();
                    sel.removeAllRanges();
                    try {
                        range.selectNodeContents(el);
                        sel.addRange(range);
                    } catch (e) {
                        range.selectNode(el);
                        sel.addRange(range);
                    }
                } else if (body.createTextRange) {
                    range = body.createTextRange();
                    range.moveToElementText(el);
                    range.select();
                }
            };

            selectAllButton.addEventListener('click', () => {
                selectElementContents(table);
                document.execCommand('copy');
            });

        </script>
@endsection

