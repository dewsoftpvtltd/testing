 <div class="input-field col s12 m6 l6">
    <select name="program_id" id="program_id" value="{{old('program_id')}}">
      <option value="" disabled selected>Choose your Program</option>
      @foreach($programs as $program)
      <option value="{{$program->getId()}}">{{$program->getName()}}</option>
      @endforeach
    </select>
    <label for="program_id">Program</label>
    @if ($errors->has('program_id'))
      <span class="red-text">{{ $errors->first('program_id')}}</span>
    @endif
  </div>