<div class="input-field col s12 m6 l8">
      <input type="password" id="password" name="password">
      <label data-error="Sorry!" data-success="" for="password">Password</label>
    @if ($errors->has('password'))
      <span class="red-text">{{ $errors->first('password')}}</span>
    @endif
    </div>