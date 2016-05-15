<div class="input-field col s12 m6 l8">
<input type="text" id="deadline" class="validate" name="deadline" value="{{old('deadline')}}">
<label data-error="Sorry!" data-success="Good!" for="deadline">Deadline</label>
@if ($errors->has('deadline'))
<span class="red-text">{{ $errors->first('deadline')}}</span>
@endif
</div>