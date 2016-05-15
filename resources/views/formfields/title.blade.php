<div class="input-field col s12 m6 l8">
<input type="text" id="title" class="validate" name="title" value="{{old('title')}}">
<label data-error="Sorry!" data-success="Good!" for="title">Title</label>
@if ($errors->has('title'))
<span class="red-text">{{ $errors->first('title')}}</span>
@endif
</div>