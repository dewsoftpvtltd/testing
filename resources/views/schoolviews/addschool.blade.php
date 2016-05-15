@extends('layouts.app')

@section('content')

   <div class="row">
      <div class="col s12 m12 l12">
       
        <div>
       
         
          
          <h4>Add a School </h4>
          <hr>
          <form class="col s12" method="post" action="{{ route('school.add.post') }}">
          {{ csrf_field() }}
           <div class="row">
        
         @include('formfields.fname')
         @include('formfields.mname')
         @include('formfields.lname')
         @include('formfields.addname')
         @include('formfields.xname')
         @include('formfields.branch')
         


          </div>
           <button class="btn waves-effect waves-light" type="submit" name="action">Add School
            <i class="material-icons right">send</i>
          </button> 
          
        </form>
        </div>
        
      </div>
    </div>


@endsection