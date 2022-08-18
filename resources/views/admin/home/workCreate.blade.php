@extends('layouts.admin_layout1')
@section('content')
<div class="row">
<div class=col-12>
<form method="post" action="{{route('workProcess.store')}}" enctype="multipart/form-data">
@csrf
<div class="mb-3 mt-3">
    <label for="email" class="form-label">title</label>
    <input type="text" class="form-control" id="email" placeholder="Enter title" name="title">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">description</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="description">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">image:</label>
    <input type="file" class="form-control" id="pwd"  name="img">
  </div>
  <button type="submit" class="btn btn-primary">create</button>
</form>
</div>
</div> 
@endsection