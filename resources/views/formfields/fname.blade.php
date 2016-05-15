<div class="input-field col s12 m6 l8">
<input type="text" id="fname" class="validate" name="fname" value="{{old('fname')}}">
<label data-error="Sorry!" data-success="Good!" for="fname">First Name</label>
@if ($errors->has('fname'))
<span class="red-text">{{ $errors->first('fname')}}</span>
@endif
</div>