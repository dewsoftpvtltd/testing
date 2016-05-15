 <div class="input-field col s12 m6 l6">
    <select name="section_id" id="section_id" value="{{old('section_id')}}">
      <option value="" disabled selected>Choose your Section</option>
      @foreach($sections as $section)
      <option value="{{$section->getId()}}">{{$section->getName()}}</option>
      @endforeach
    </select>
    <label for="section_id">Section</label>
    @if ($errors->has('section_id'))
      <span class="red-text">{{ $errors->first('section_id')}}</span>
    @endif
  </div>