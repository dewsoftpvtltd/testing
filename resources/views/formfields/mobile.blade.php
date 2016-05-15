<div class="input-field col s12 m6 l8">
<input type="text" id="mobile" class="validate" name="mobile" value="{{old('mobile')}}">
<label data-error="Sorry!" data-success="Good!" for="mobile">Mobile</label>
@if ($errors->has('mobile'))
<span class="red-text">{{ $errors->first('mobile')}}</span>
@endif
</div>