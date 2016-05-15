<div class="input-field col s12 m6 l8">
<input type="text" id="endtime" class="validate" name="endtime" value="{{old('endtime')}}">
<label data-error="Sorry!" data-success="Good!" for="endtime">Ending Time</label>
@if ($errors->has('endtime'))
<span class="red-text">{{ $errors->first('endtime')}}</span>
@endif
</div>