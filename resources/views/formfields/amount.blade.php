<div class="input-field col s12 m6 l8">
<input type="text" id="amount" class="validate" name="amount" value="{{old('amount')}}">
<label data-error="Sorry!" data-success="Good!" for="amount">Amount</label>
@if ($errors->has('amount'))
<span class="red-text">{{ $errors->first('amount')}}</span>
@endif
</div>