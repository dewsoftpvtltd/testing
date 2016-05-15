<div class="input-field col s12 m6 l8">
<input type="text" id="tname" class="validate" name="tname" value="{{old('tname')}}">
<label data-error="Sorry!" data-success="Good!" for="tname">Title</label>
@if ($errors->has('tname'))
<span class="red-text">{{ $errors->first('tname')}}</span>
@endif
</div>