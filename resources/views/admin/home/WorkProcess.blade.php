@extends('layouts.admin_layout1')
@section('content')
<div class="row">
    <div class="col-4">
    @foreach($workProcess as $workprocess)
    <h3>{{$workprocess->title}}</h3>
    <p>{{$workprocess->description}}</p>
    <button class="btn btn-primary"><a href="{{route('workProcess.update',$workprocess->id)}}" class="text-white text-decoration-none ">change</a></button>
    @endforeach
</div>
</div>
<div class="row">
  <div class="col mt-5">
<button class="btn btn-primary"><a href="{{route('workProcess.create')}}" class="text-white text-decoration-none">create</a></button>
</div>
@endsection