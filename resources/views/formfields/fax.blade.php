<div class="input-field col s12 m6 l8">
<input type="text" id="fax" class="validate" name="fax" value="{{old('fax')}}">
<label data-error="Sorry!" data-success="Good!" for="fax">Fax</label>
@if ($errors->has('fax'))
<span class="red-text">{{ $errors->first('fax')}}</span>
@endif
</div>