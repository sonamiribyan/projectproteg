@extends('layouts.admin_layout1')
@section('content')
<div class="row">
<div class=col-12>
<form method="post" action="{{route('about.restore',$about->id)}}" enctype="multipart/form-data">
@csrf
<div class="mb-3 mt-3">
    <label for="email" class="form-label">title</label>
    <input type="text" class="form-control" id="email" placeholder="Enter title" name="title" value={{$about->title}}>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">mindescription</label>
    <input type="text" class="form-control" id="email" placeholder="Enter mindescription" name="minDescription" value={{$about->minDescription}}>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">description</label>
    <textarea class="ckeditor form-control" name="description" id="email">{{$about->description}}</textarea>
    <div></div>
  <div class="mb-3">
    <label for="pwd" class="form-label">image:</label>
    <input type="file" class="form-control" id="pwd"  name="img">
  </div>
  <button type="submit" class="btn btn-primary">update</button>
  @foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</form>
</div>
</div>
@endsection