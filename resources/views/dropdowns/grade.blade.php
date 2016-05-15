 <div class="input-field col s12 m6 l6">
    <select name="grade_id" id="grade_id" value="{{old('grade_id')}}">
      <option value="" disabled selected>Choose your Grade</option>
      @foreach($grades as $grade)
      <option value="{{$grade->getId()}}">{{$grade->getName()}}</option>
      @endforeach
    </select>
    <label for="grade_id">Grade</label>
    @if ($errors->has('grade_id'))
      <span class="red-text">{{ $errors->first('grade_id')}}</span>
    @endif
  </div>