@extends('layouts.admin_layout1')

@section('content')
    <div class="row">
    <div class="col-12 d-flext justifi-content-center align-items-center">
    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      @if(Auth::user()['id']==1)
      <td><a href="{{route('delete.user',$user->id)}}" class="text-decoration-none text-danger">remove</a></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@if(Auth::user()['id']==1)
<div class="row">
<div class="col-12">
<form method="post" action="{{route('admin.create')}}">
@csrf
<div class="mb-3 mt-3">
    <label for="email" class="form-label">name</label>
    <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">create</button>
</form>
@if($errors->any())
@foreach($errors->all() as $error)
 <p class="text-danger">{{$error}}</p>
@endforeach
@endif
</div>
</div>
@endif
    </div>
    </div>
@endsection