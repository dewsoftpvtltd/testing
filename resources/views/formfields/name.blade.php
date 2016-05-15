<div class="input-field col s12 m6 l8">
<input type="text" id="name" class="validate" name="name" value="{{old('name')}}">
<label data-error="Sorry!" data-success="Good!" for="name">Name</label>
@if ($errors->has('name'))
<span class="red-text">{{ $errors->first('name')}}</span>
@endif
</div>