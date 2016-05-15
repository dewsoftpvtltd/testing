<div class="input-field col s12 m6 l8">
<input type="text" id="nature" class="validate" name="nature" value="{{old('nature')}}">
<label data-error="Sorry!" data-success="Good!" for="nature">Nature</label>
@if ($errors->has('nature'))
<span class="red-text">{{ $errors->first('nature')}}</span>
@endif
</div>