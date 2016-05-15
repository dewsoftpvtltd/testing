<div class="input-field col s12 m6 l8">
<input type="text" id="designation" class="validate" name="designation" value="{{old('designation')}}">
<label data-error="Sorry!" data-success="Good!" for="designation">Designation</label>
@if ($errors->has('designation'))
<span class="red-text">{{ $errors->first('designation')}}</span>
@endif
</div>