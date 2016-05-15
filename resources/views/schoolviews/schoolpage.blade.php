@extends('layouts.app')

@section('content')

   <div class="row">
      <div class="col s12 m12 l12">
            @include('buttons.editbutton')
        <div>
            @include('schoolpartials.schoolnameandaddress')
            @include('schoolpartials.schoolcontacts')
            @include('schoolpartials.allbuildings')
            @include('schoolpartials.allcourses')
            @include('schoolpartials.allstudents')
            @include('schoolpartials.allgrades')

        </div>
        
      </div>
    </div>

@endsection