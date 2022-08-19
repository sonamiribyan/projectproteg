@extends('layouts.admin_layout1')
@section('content')
<div class="row mt-5">
@foreach($about as $abt)
<div class="col-3">
  <p>{{$abt->title}}</p>
<img src="{{asset('/storage/'.$abt->image)}}" alt="" class="img-fluid mt-3 mb-2" width="100%" height="100%" >
<p>{{$abt->minDescription}}</p>
<div><button class="btn btn-danger mt-2"> <a href="{{route('about.update',$abt->id)}}" class="text-decoration-none">update</a></button></div>
</div>
@endforeach
</div>
@endsection