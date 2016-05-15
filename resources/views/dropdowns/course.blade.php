 <div class="input-field col s12 m6 l6">
    <select name="course_id" id="course_id" value="{{old('course_id')}}">
      <option value="" disabled selected>Choose your Course</option>
      @foreach($courses as $course)
      <option value="{{$course->getId()}}">{{$course->getName()}}</option>
      @endforeach
    </select>
    <label for="course_id">Course</label>
    @if ($errors->has('course_id'))
      <span class="red-text">{{ $errors->first('course_id')}}</span>
    @endif
  </div>