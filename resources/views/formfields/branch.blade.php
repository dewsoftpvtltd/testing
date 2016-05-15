<div class="input-field col s12 m6 l8">
<input type="text" id="branch" class="validate" name="branch" value="{{old('branch')}}">
<label data-error="Sorry!" data-success="Good!" for="branch">Branch Name</label>
@if ($errors->has('branch'))
<span class="red-text">{{ $errors->first('branch')}}</span>
@endif
</div>