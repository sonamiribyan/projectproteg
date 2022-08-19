@extends('layouts.admin_layout1')
@section('content')
<div class="row">
<div class=col-12>
<form method="post" action="{{route('project.store')}}" enctype="multipart/form-data">
@csrf
<div class="mb-3 mt-3">
    <label for="email" class="form-label">title</label>
    <input type="text" class="form-control" id="email" placeholder="Enter title" name="title">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">description</label>
    <input type="text" class="form-control" id="email" placeholder="Enter description" name="description">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">description</label>
    <textarea class="ckeditor form-control" name="minDescription" id="email"></textarea>
    <div></div>
  <div class="mb-3">
    <label for="pwd" class="form-label">image:</label>
    <input type="file" class="form-control" id="pwd"  name="img">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">video</label>
    <input type="file" class="form-control" id="email"  name="video">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">price</label>
    <input type="text" class="form-control" id="email" placeholder="Enter price" name="price">
  </div>
  <button type="submit" class="btn btn-primary">create</button>
  @foreach($errors->all() as $error)
`{{$error}}
@endforeach
</form>
</div>
</div>
<div class="row mt-5">
@foreach($project as $proj)
<div class="col-3">
  <p>{{$proj->title}}</p>
<img src="{{asset('/storage/'.$proj->image)}}" alt="" class="img-fluid mt-3 mb-2" width="100%" height="100%" >
<iframe src="{{asset('/storage/'.$proj->video)}}" class="img-fluid mt-2"></iframe>
<p>{{$proj->price .'$'}}</p>
  <div><button class="btn btn-danger mt-2"> <a href="{{route('project.delete',$proj->id)}}" class="text-decoration-none">remove</a></button></div>
<div><button class="btn btn-danger mt-2"> <a href="{{route('project.update',$proj->id)}}" class="text-decoration-none">update</a></button></div>
</div>
@endforeach
</div>
</div>
@endsection