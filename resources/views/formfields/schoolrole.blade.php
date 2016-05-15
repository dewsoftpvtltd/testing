<div class="input-field col s12 m6 l8">
<input type="text" id="schoolrole" class="validate" name="schoolrole" value="{{old('schoolrole')}}">
<label data-error="Sorry!" data-success="Good!" for="schoolrole">Role in School</label>
@if ($errors->has('schoolrole'))
<span class="red-text">{{ $errors->first('schoolrole')}}</span>
@endif
</div>