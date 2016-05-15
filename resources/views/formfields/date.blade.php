<div class="input-field col s12 m6 l8">
<input type="text" id="date" class="datepicker" name="date" value="{{old('date')}}">
<label data-error="Sorry!" data-success="Good!" for="date">Date</label>
@if ($errors->has('date'))
<span class="red-text">{{ $errors->first('date')}}</span>
@endif
</div>