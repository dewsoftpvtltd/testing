<div class="input-field col s12 m6 l8">
<input type="text" id="code" class="validate" name="code" value="{{old('code')}}">
<label data-error="Sorry!" data-success="Good!" for="code">Code</label>
@if ($errors->has('code'))
<span class="red-text">{{ $errors->first('code')}}</span>
@endif
</div>