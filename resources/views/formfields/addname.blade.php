<div class="input-field col s12 m6 l8">
<input type="text" id="addname" class="validate" name="addname" value="{{old('addname')}}">
<label data-error="Sorry!" data-success="Good!" for="addname">Additional Name</label>
@if ($errors->has('addname'))
<span class="red-text">{{ $errors->first('addname')}}</span>
@endif
</div>