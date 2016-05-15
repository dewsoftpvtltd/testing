<div class="input-field col s12 m6 l8">
<input type="text" id="lname" class="validate" name="lname" value="{{old('lname')}}">
<label data-error="Sorry!" data-success="Good!" for="lname">Last Name</label>
@if ($errors->has('lname'))
<span class="red-text">{{ $errors->first('lname')}}</span>
@endif
</div>