@extends('layouts.app')

@section('content')
<div class="row">
      <div class="col s12 m12 l12">
<h4>Sign In</h4>
<hr>
<form method="post" class="col s12" action="{{ route('auth.signin') }}">
{{ csrf_field() }}

  <div class="row">
    
    <div class="input-field col s12 m6 l8">
      <input type="email" id="email" class="validate" name="email" value="{{old('email')}}">
      <label data-error="Sorry!" data-success="" for="email"><i class="mdi mdi-account"> Email</i></label>
    @if ($errors->has('email'))
      <span class="red-text">{{ $errors->first('email')}}</span>
    @endif
    </div>
    
   <div class="input-field col s12 m6 l8">
      <input type="password" id="password" name="password">
      <label data-error="Sorry!" data-success="" for="password"><i class="mdi mdi-account-key"> Password</i></label>
    @if ($errors->has('password'))
      <span class="red-text">{{ $errors->first('password')}}</span>
    @endif
    </div>
  </div>

  <p>
       <input type="checkbox" name="remember" id="remember"> <label for="remember"> Remember me</label>
    </p>
    
  <button class="btn waves-effect waves-light" type="submit" name="action">Sign In
    <i class="material-icons right">send</i>
  </button>  
  
  
</form>
</div>
</div>
</div>
@stop