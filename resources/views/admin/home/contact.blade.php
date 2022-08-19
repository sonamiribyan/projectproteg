@extends('layouts.admin_layout1')
@section('content')
<div class="row mt-5">
@foreach($contact as $c)
<div class="col-3">
  <p>email:{{$c->email}}</p>
<p>phone:{{$c->phone}}</p>
<p>adress:{{$c->office}}</p>
<div><button class="btn btn-danger mt-2"> <a href="" class="text-decoration-none">update</a></button></div>
</div>
@endforeach
</div>
@endsection