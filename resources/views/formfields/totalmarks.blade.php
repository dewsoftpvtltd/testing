<div class="input-field col s12 m6 l8">
<input type="text" id="totalmarks" class="validate" name="totalmarks" value="{{old('totalmarks')}}">
<label data-error="Sorry!" data-success="Good!" for="totalmarks">Total Marks</label>
@if ($errors->has('totalmarks'))
<span class="red-text">{{ $errors->first('totalmarks')}}</span>
@endif
</div>