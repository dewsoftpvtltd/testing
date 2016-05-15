<div class="input-field col s12 m6 l8">
<input type="text" id="detail" class="validate" name="detail" value="{{old('detail')}}">
<label data-error="Sorry!" data-success="Good!" for="detail">Details</label>
@if ($errors->has('detail'))
<span class="red-text">{{ $errors->first('detail')}}</span>
@endif
</div>