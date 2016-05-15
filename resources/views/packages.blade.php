@extends('layouts.app')

@section('content')
 <div class="row">
      
        <div class="card-panel white">
          <span class="blue-grey-text">The best bargain that you can get in this world!
          </span>
        </div>
  
        @include('skoolum.package')
    
 
    </div> 
     <div class="row">
     @if(Request::segment(2) != 'low')
        @include('skoolum.lowpackages')
          @endif
          @if(Request::segment(2) != 'medium')
        @include('skoolum.mediumpackages')
          @endif
        @if(Request::segment(2) != 'high')
        @include('skoolum.highpackages')
        
           @endif

      </div>


@endsection
