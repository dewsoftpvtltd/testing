<div class="input-field col s12 m6 l8">
<input type="text" id="session" class="validate" name="session" value="{{old('session')}}">
<label data-error="Sorry!" data-success="Good!" for="session">Session</label>
@if ($errors->has('session'))
<span class="red-text">{{ $errors->first('session')}}</span>
@endif
</div>