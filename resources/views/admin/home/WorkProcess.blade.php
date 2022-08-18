@extends('layouts.admin_layout1')
@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-6">
    @if($workProcess->count()==0)
    <button class="btn btn-primary"><a href="{{route('workProcess.create')}}" class="text-white">create</a></button>
      @endif 
      @if($workProcess->count()!==0)
    @foreach($workProcess as $workprocess)
    <div>
    <h3>{{$workprocess->title}}</h3>
    <p>{{$workprocess->description}}</p>
    <button class="btn btn-primary"><a href="{{route('workProcess.update',$workprocess->id)}}" class="text-white">change</a></button>
</div>
    @endforeach
    @endif 
</div>
</div>
@endsection