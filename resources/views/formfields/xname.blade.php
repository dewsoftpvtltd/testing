<div class="input-field col s12 m6 l8">
<input type="text" id="xname" class="validate" name="xname" value="{{old('xname')}}">
<label data-error="Sorry!" data-success="Good!" for="xname">Another Additional Name</label>
@if ($errors->has('xname'))
<span class="red-text">{{ $errors->first('xname')}}</span>
@endif
</div>