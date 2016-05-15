<div class="input-field col s12 m6 l8">
<input type="text" id="type" class="validate" name="type" value="{{old('type')}}">
<label data-error="Sorry!" data-success="Good!" for="type">Type</label>
@if ($errors->has('type'))
<span class="red-text">{{ $errors->first('type')}}</span>
@endif
</div>