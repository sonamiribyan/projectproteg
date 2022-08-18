@extends('layouts.admin_layout1')
@section('content')
<div class="row">
<div class=col-12>
<form method="post" action="{{route('admin.team.create')}}" enctype="multipart/form-data">
@csrf
<div class="mb-3 mt-3">
    <label for="email" class="form-label">title</label>
    <input type="text" class="form-control" id="email" placeholder="Enter title" name="title">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">image:</label>
    <input type="file" class="form-control" id="pwd"  name="img">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">fb-link</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="fb_link">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">twitter-link</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="twitter_link">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">linkden link</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="linkden_link">
  </div>
  <button type="submit" class="btn btn-primary">create</button>
</form>
</div>
</div>
<div class="row mt-5">
@foreach($team as $t)
<div class="col-3">
  <p>{{$t->title}}</p>
<img src="{{asset('/storage/'.$t->img_url)}}" alt="" class="img-fluid" width="100%" height="100%">
<div>
<button class="btn btn-danger mt-2"> <a href="{{route('admin.team.delete',$t->id)}}" class="text-decoration-none">remove</a></button>
</div>
<div>
<button class="btn btn-success mt-2"> <a href="{{route('admin.team.update',$t->id)}}" class="text-decoration-none">update</a></button>
</div>
</div>
@endforeach
</div>
</div>
@endsection