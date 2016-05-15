<div class="input-field col s12 m6 l8">
<input type="text" id="seats" class="validate" name="seats" value="{{old('seats')}}">
<label data-error="Sorry!" data-success="Good!" for="seats">Number of Seats</label>
@if ($errors->has('seats'))
<span class="red-text">{{ $errors->first('seats')}}</span>
@endif
</div>