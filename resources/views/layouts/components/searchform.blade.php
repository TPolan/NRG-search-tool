@extends('layouts.search')

@section('searchForm')
<form action="get" >
@csrf
<div class="form-group">
    <label for="formGroupExampleInput">Artist Name:</label>
    <input type="text" class="form-control" name="name" id="name" >

    <label for="formGroupExampleInput2">Exclude:</label>
    <input type="text" class="form-control" id="exclude" name="exclude" >

    <button class="btn btn-primary btn-lg">Search</button>
</div>

</form>
@endsection
