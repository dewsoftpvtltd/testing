<div class="input-field col s12 m6 l8">
<input type="text" id="account" class="validate" name="account" value="{{old('account')}}">
<label data-error="Sorry!" data-success="Good!" for="account">Bank Account No.</label>
@if ($errors->has('account'))
<span class="red-text">{{ $errors->first('account')}}</span>
@endif
</div>