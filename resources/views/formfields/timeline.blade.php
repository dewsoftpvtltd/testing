<div class="input-field col s12 m6 l8">
<input type="text" id="timeline" class="validate" name="timeline" value="{{old('timeline')}}">
<label data-error="Sorry!" data-success="Good!" for="timeline">Time Line</label>
@if ($errors->has('timeline'))
<span class="red-text">{{ $errors->first('timeline')}}</span>
@endif
</div>