 <div class="input-field col s12 m6 l6">
    <select name="state_id" id="state_id" value="{{old('state_id')}}">
      <option value="" disabled selected>Choose your State/Province</option>
      @foreach($states as $state)
      <option value="{{$state->getId()}}">{{$state->getName()}}</option>
      @endforeach
    </select>
    <label for="state_id">State/Province</label>
    @if ($errors->has('state_id'))
      <span class="red-text">{{ $errors->first('state_id')}}</span>
    @endif
  </div>