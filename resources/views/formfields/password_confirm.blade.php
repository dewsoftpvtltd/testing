<div class="input-field col s12 m6 l8">
      <input type="password" id="password" name="password_confirmation">
      <label data-error="Sorry!" data-success="" for="password">Confirm Password</label>
    @if ($errors->has('password_confirmation'))
      <span class="red-text">{{ $errors->first('password_confirmation')}}</span>
    @endif
    </div>
  </div>