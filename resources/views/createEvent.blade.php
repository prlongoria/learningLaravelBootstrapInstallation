@extends('layouts.app')
<form class="justify-content-center" action="{{ route('storeEvent') }}" method="post">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Spaces</label>
    <input type="text" name="spaces" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Image</label>
    <input type="text" name="image" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  
  <div class="float-right">
    <a class="btn btn-primary" href="{{ route('home') }}">🔁</a>
  </div>
  <div class="btnCreate">
    <button type="submit" class="btn btn-outline-success" value="Create">Create</button>
  </div>
</form>