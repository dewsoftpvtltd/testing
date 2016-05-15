<div class="input-field col s12 m6 l8">
<input type="text" id="location" class="validate" name="location" value="{{old('location')}}">
<label data-error="Sorry!" data-success="Good!" for="location">Location</label>
@if ($errors->has('location'))
<span class="red-text">{{ $errors->first('location')}}</span>
@endif
</div>