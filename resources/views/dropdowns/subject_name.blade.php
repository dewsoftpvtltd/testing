 <div class="input-field col s12 m6 l6">
    <select name="subject_name_id" id="subject_name_id" value="{{old('subject_name_id')}}">
      <option value="" disabled selected>Choose your Subject Name</option>
      @foreach($subject_names as $subject_name)
      <option value="{{$subject_name->getId()}}">{{$subject_name->getName()}}</option>
      @endforeach
    </select>
    <label for="subject_name_id">Subject Name</label>
    @if ($errors->has('subject_name_id'))
      <span class="red-text">{{ $errors->first('subject_name_id')}}</span>
    @endif
  </div>