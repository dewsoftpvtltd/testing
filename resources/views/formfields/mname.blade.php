<div class="input-field col s12 m6 l8">
<input type="text" id="mname" class="validate" name="mname" value="{{old('mname')}}">
<label data-error="Sorry!" data-success="Good!" for="mname">Middle Name</label>
@if ($errors->has('mname'))
<span class="red-text">{{ $errors->first('mname')}}</span>
@endif
</div>