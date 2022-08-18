@extends('layouts.admin_layout1')
@section('content')
<div class="container">
<div class="row">
<div class="col-12">
<form method="post" action="{{route('user.loginUser')}}">
    @csrf
  <div class="form-group">
  <input class="form-control form-control-md mt-3" type="email" placeholder="email" name="email">
  <input class="form-control form-control-md mt-3" type="password" placeholder="password" name="password">
  <button class="btn btn-success mt-3">loginn</button>
</div>
</form>
</div>
</div>
</div>
@endsection