<div class="input-field col s12 m6 l8">
<input type="text" id="paymentstatus" class="validate" name="paymentstatus" value="{{old('paymentstatus')}}">
<label data-error="Sorry!" data-success="Good!" for="paymentstatus">Payment Status</label>
@if ($errors->has('paymentstatus'))
<span class="red-text">{{ $errors->first('paymentstatus')}}</span>
@endif
</div>