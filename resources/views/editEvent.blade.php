@extends('layouts.app')
@section('content')
<h2>Edit an Event</h2>
<form class="justify-content-center" action="{{ route('updateEvent', $event->id) }}" method="post">
    @method('PATCH')
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$event->name}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="{{$event->description}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Spaces</label>
    <input type="text" name="spaces" class="form-control" id="exampleFormControlInput1" value="{{$event->spaces}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Image</label>
    <input type="text" name="image" class="form-control" id="exampleFormControlInput1" value="{{$event->image}}">
  </div>
  
  <div class="float-right">
    <a class="btn btn-primary" href="{{ route('home') }}">🔁</a>
  </div>
  <div class="btnCreate">
    <button type="submit" class="btn btn-outline-success" value="Create">Save</button>
  </div>
</form>
@endsection