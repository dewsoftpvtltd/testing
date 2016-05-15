<div class="input-field col s12 m6 l8">
<input type="text" id="dob" class="datepicker" name="dob" value="{{old('dob')}}">
<label data-error="Sorry!" data-success="Good!" for="dob">Date of Birth</label>
@if ($errors->has('dob'))
<span class="red-text">{{ $errors->first('dob')}}</span>
@endif
</div>
 