<div class="input-field col s12 m6 l8">
<input type="text" id="relationship" class="validate" name="relationship" value="{{old('relationship')}}">
<label data-error="Sorry!" data-success="Good!" for="relationship">Relationship</label>
@if ($errors->has('relationship'))
<span class="red-text">{{ $errors->first('relationship')}}</span>
@endif
</div>