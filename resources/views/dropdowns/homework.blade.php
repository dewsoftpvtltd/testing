 <div class="input-field col s12 m6 l6">
    <select name="homework_id" id="homework_id" value="{{old('homework_id')}}">
      <option value="" disabled selected>Choose your Homework</option>
      @foreach($homeworks as $homework)
      <option value="{{$homework->getId()}}">{{$homework->getName()}}</option>
      @endforeach
    </select>
    <label for="homework_id">Homework</label>
    @if ($errors->has('homework_id'))
      <span class="red-text">{{ $errors->first('homework_id')}}</span>
    @endif
  </div>