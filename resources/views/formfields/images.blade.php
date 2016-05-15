<div class="input-field col s12 m6 l8">
<input type="text" id="images" class="validate" name="images" value="{{old('images')}}">
<label data-error="Sorry!" data-success="Good!" for="images">Images</label>
@if ($errors->has('images'))
<span class="red-text">{{ $errors->first('images')}}</span>
@endif
</div>