<div class="input-field col s12 m6 l8">
<input type="text" id="enddate" class="validate" name="enddate" value="{{old('enddate')}}">
<label data-error="Sorry!" data-success="Good!" for="enddate">Ending Date</label>
@if ($errors->has('enddate'))
<span class="red-text">{{ $errors->first('enddate')}}</span>
@endif
</div>