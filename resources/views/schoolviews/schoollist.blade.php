@extends('layouts.app')

@section('content')

   <div class="row">
      <div class="col s12 m12 l12">
       <div class="fixed-action-btn horizontal" style="top: 45px; right: 24px;">
           <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('school.add')}}"><i class="material-icons">add</i></a>
      </div>
        <div>
       
         
           @foreach($schools as $skool)
          <div class="card-panel white">
          
          <span class="orange-text">
          <a href="{{route('school.page', ['school'=>$skool->getId()])}}"> {{$skool->getName()}}</a>
          </span>
         

        </div>
         @endforeach
         
       
        </div>
        
      </div>
    </div>


@endsection