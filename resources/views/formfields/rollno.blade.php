<div class="input-field col s12 m6 l8">
<input type="text" id="rollno" class="validate" name="rollno" value="{{old('rollno')}}">
<label data-error="Sorry!" data-success="Good!" for="rollno">Roll Number</label>
@if ($errors->has('rollno'))
<span class="red-text">{{ $errors->first('rollno')}}</span>
@endif
</div>