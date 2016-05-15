 <div class="input-field col s12 m6 l6">
    <select name="hall_id" id="hall_id" value="{{old('hall_id')}}">
      <option value="" disabled selected>Choose your Hall</option>
      @foreach($halls as $hall)
      <option value="{{$hall->getId()}}">{{$hall->getName()}}</option>
      @endforeach
    </select>
    <label for="hall_id">Hall</label>
    @if ($errors->has('hall_id'))
      <span class="red-text">{{ $errors->first('hall_id')}}</span>
    @endif
  </div>