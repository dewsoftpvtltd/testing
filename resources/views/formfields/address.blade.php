<div class="input-field col s12 m6 l8">
<input type="text" id="address" class="validate" name="address" value="{{old('address')}}">
<label data-error="Sorry!" data-success="Good!" for="address">Address</label>
@if ($errors->has('address'))
<span class="red-text">{{ $errors->first('address')}}</span>
@endif
</div>