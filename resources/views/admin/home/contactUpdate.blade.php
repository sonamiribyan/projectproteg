@extends('layouts.admin_layout1')
@section('content')
<div class="row">
<div class=col-12>
<form method="post" action="{{route('contact.restore',$contact->id)}}" enctype="multipart/form-data">
@csrf
<div class="mb-3 mt-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value={{$contact->email}}>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">office</label>
    <input type="text" class="form-control" id="email" placeholder="Enter office name" name="office" value={{$contact->office}}>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">contact</label>
    <input type="text" class="form-control" id="email" placeholder="Enter contact" name="phone" value={{$contact->phone}}>
  </div>
  <button type="submit" class="btn btn-primary">update</button>
  @foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</form>
</div>
</div>
@endsection