<div class="input-field col s12 m6 l8">
<input type="text" id="status" class="validate" name="status" value="{{old('status')}}">
<label data-error="Sorry!" data-success="Good!" for="status">Status</label>
@if ($errors->has('status'))
<span class="red-text">{{ $errors->first('status')}}</span>
@endif
</div>