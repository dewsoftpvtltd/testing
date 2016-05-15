<div class="input-field col s12 m6 l8">
<input type="email" id="email" class="validate" name="email" value="{{old('email')}}">
<label data-error="Sorry!" data-success="Good!" for="email">Email</label>
@if ($errors->has('email'))
<span class="red-text">{{ $errors->first('email')}}</span>
@endif
</div>