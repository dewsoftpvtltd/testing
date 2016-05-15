<div class="input-field col s12 m6 l8">
<input type="text" id="body" class="validate" name="body" value="{{old('body')}}">
<label data-error="Sorry!" data-success="Good!" for="body">Body</label>
@if ($errors->has('body'))
<span class="red-text">{{ $errors->first('body')}}</span>
@endif
</div>