<div class="input-field col s12 m6 l8">
<input type="text" id="position" class="validate" name="position" value="{{old('position')}}">
<label data-error="Sorry!" data-success="Good!" for="position">Position</label>
@if ($errors->has('position'))
<span class="red-text">{{ $errors->first('position')}}</span>
@endif
</div>