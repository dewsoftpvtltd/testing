<div class="input-field col s12 m6 l8">
<input type="text" id="percent" class="validate" name="percent" value="{{old('percent')}}">
<label data-error="Sorry!" data-success="Good!" for="percent">Percentage</label>
@if ($errors->has('percent'))
<span class="red-text">{{ $errors->first('percent')}}</span>
@endif
</div>