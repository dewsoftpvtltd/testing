 <div class="input-field col s12 m6 l6">
    <select name="student_id" id="student_id" value="{{old('student_id')}}">
      <option value="" disabled selected>Choose your Student</option>
      @foreach($students as $student)
      <option value="{{$student->getId()}}">{{$student->getName()}}</option>
      @endforeach
    </select>
    <label for="student_id">Student</label>
    @if ($errors->has('student_id'))
      <span class="red-text">{{ $errors->first('student_id')}}</span>
    @endif
  </div>