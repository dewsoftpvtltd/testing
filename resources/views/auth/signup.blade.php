@extends('layouts.app')

@section('content')

<h4>Sign Up </h4>
<hr>
<form class="col s12" method="post" action="{{ route('auth.signup') }}">
{{ csrf_field() }}

  <div class="row">
     <div class="input-field col s12 m6 l8">
      <input type="text" id="fname" class="validate" name="fname" value="{{old('fname')}}">
      <label data-error="Sorry!" data-success="" for="fname">First Name</label>
    @if ($errors->has('fname'))
      <span class="red-text">{{ $errors->first('fname')}}</span>
    @endif
    </div>
     <div class="input-field col s12 m6 l8">
      <input type="text" id="lname" class="validate" name="lname" value="{{old('lname')}}">
      <label data-error="Sorry!" data-success="" for="lname">First Name</label>
    @if ($errors->has('lname'))
      <span class="red-text">{{ $errors->first('lname')}}</span>
    @endif
    </div>
   
    <div class="input-field col s12 m6 l8">
      <input type="email" id="email" class="validate" name="email" value="{{old('email')}}">
      <label data-error="Sorry!" data-success="" for="email">Email</label>
    @if ($errors->has('email'))
      <span class="red-text">{{ $errors->first('email')}}</span>
    @endif
    </div>
     <div class="input-field col s12 m6 l8">
      <input type="text" id="usertype" class="validate" name="usertype" value="{{old('usertype')}}">
      <label data-error="Sorry!" data-success="" for="usertype">Type of User</label>
    @if ($errors->has('usertype'))
      <span class="red-text">{{ $errors->first('usertype')}}</span>
    @endif
    </div>
      <div class="input-field col s12 m6 l6">
    <select name="country_id" id="country_id" value="{{old('country_id')}}">
      <option value="" disabled selected>Choose your Country</option>
      @foreach($countries as $country)
      <option value="{{$country->getId()}}">{{$country->getName()}}</option>
      @endforeach
    </select>
    <label for="country_id">Country</label>
    @if ($errors->has('country_id'))
      <span class="red-text">{{ $errors->first('country_id')}}</span>
    @endif
  </div>
   <div class="input-field col s12 m6 l8">
      <input type="password" id="password" name="password">
      <label data-error="Sorry!" data-success="" for="password">Password</label>
    @if ($errors->has('password'))
      <span class="red-text">{{ $errors->first('password')}}</span>
    @endif
    </div>
  
  <div class="input-field col s12 m6 l8">
      <input type="password" id="password" name="password_confirmation">
      <label data-error="Sorry!" data-success="" for="password">Confirm Password</label>
    @if ($errors->has('password_confirmation'))
      <span class="red-text">{{ $errors->first('password_confirmation')}}</span>
    @endif
    </div>
  </div>
 
      
  <button class="btn waves-effect waves-light" type="submit" name="action">Sign Up
    <i class="material-icons right">send</i>
  </button> 
  
</form>
@stop