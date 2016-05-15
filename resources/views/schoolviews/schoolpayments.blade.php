@extends('layouts.app')

@section('content')

   <div class="row">
      <div class="col s12 m12 l12">
            @include('buttons.editbutton')
        <div>
            
            @include('schoolpartials.schoolpayments')
          

        </div>
        
      </div>
    </div>

@endsection