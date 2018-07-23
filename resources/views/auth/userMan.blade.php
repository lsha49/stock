<!DOCTYPE html>
<html>
<!--@include('others.valueSearch',['urlValue' => 'vsearchResult']);-->

<br>
<br>
<br>

@extends('layouts.app')


@section('content')



@foreach($users as $key => $value)
          <li>name: {{  $value->name }}</li>
          <li>email: {{ $value->email }}</li>



                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this user', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this user</a>

<br>
<br>

    @endforeach









<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>



<h3>filter search</h3>
 <input list="myList">
  <datalist id="myList">

      @foreach($users as $key => $value)
                <option value  = "{{  $value->name }}" >
      @endforeach


  </datalist>

<h3>eloquent query search</h3>
<p><a href="{{ URL::to('userSearch') }}">search a user</p>





</body>
</html>

@endsection
































</html>
