 <div class="input-field col s12 m6 l6">
    <select name="teacher_id" id="teacher_id" value="{{old('teacher_id')}}">
      <option value="" disabled selected>Choose your Teacher</option>
      @foreach($teachers as $teacher)
      <option value="{{$teacher->getId()}}">{{$teacher->getName()}}</option>
      @endforeach
    </select>
    <label for="teacher_id">Teacher</label>
    @if ($errors->has('teacher_id'))
      <span class="red-text">{{ $errors->first('teacher_id')}}</span>
    @endif
  </div>