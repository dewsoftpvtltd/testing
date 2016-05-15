<div class="input-field col s12 m6 l8">
<input type="text" id="obtainedmarks" class="validate" name="obtainedmarks" value="{{old('obtainedmarks')}}">
<label data-error="Sorry!" data-success="Good!" for="obtainedmarks">Marks Obtained</label>
@if ($errors->has('obtainedmarks'))
<span class="red-text">{{ $errors->first('obtainedmarks')}}</span>
@endif
</div>