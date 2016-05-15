<div class="input-field col s12 m6 l8">
<input type="text" id="phone" class="validate" name="phone" value="{{old('phone')}}">
<label data-error="Sorry!" data-success="Good!" for="phone">Phone</label>
@if ($errors->has('phone'))
<span class="red-text">{{ $errors->first('phone')}}</span>
@endif
</div>