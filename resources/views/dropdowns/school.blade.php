 <div class="input-field col s12 m6 l6">
    <select name="school_id" id="school_id" value="{{old('school_id')}}">
      <option value="" disabled selected>Choose your School</option>
      @foreach($schools as $school)
      <option value="{{$school->getId()}}">{{$school->getName()}}</option>
      @endforeach
    </select>
    <label for="school_id">School</label>
    @if ($errors->has('school_id'))
      <span class="red-text">{{ $errors->first('school_id')}}</span>
    @endif
  </div>