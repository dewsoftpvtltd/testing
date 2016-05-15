 <div class="input-field col s12 m6 l6">
    <select name="subject_id" id="subject_id" value="{{old('subject_id')}}">
      <option value="" disabled selected>Choose your Subject</option>
      @foreach($subjects as $subject)
      <option value="{{$subject->getId()}}">{{$subject->getName()}}</option>
      @endforeach
    </select>
    <label for="subject_id">Subject</label>
    @if ($errors->has('subject_id'))
      <span class="red-text">{{ $errors->first('subject_id')}}</span>
    @endif
  </div>