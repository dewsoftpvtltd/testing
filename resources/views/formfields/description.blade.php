<div class="input-field col s12 m6 l8">
<input type="text" id="description" class="validate" name="description" value="{{old('description')}}">
<label data-error="Sorry!" data-success="Good!" for="description">Description</label>
@if ($errors->has('description'))
<span class="red-text">{{ $errors->first('description')}}</span>
@endif
</div>