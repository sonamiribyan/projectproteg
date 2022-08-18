@extends('layouts.admin_layout1')
@section('content')
<div class="row">
<div class=col-12>
<form method="post" action="{{route('admin.team.store',$team->id)}}" enctype="multipart/form-data">
@csrf
<div class="mb-3 mt-3">
    <label for="email" class="form-label">title</label>
    <input type="text" class="form-control" id="email" placeholder="Enter title" name="title" value={{$team->title}}>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">image:</label>
    <input type="file" class="form-control" id="pwd"  name="img">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">fb-link</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="fb_link" value={{$team->fb_link}}>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">twitter-link</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="twitter_link" value={{$team->twitter_link}}>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">linkden link</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="linkden_link" value={{$team->linkden_link}}>
  </div>
  <button type="submit" class="btn btn-primary">update</button>
</form>
</div>
</div>
@endsection