 <div class="input-field col s12 m6 l6">
    <select name="facility_id" id="facility_id" value="{{old('facility_id')}}">
      <option value="" disabled selected>Choose your Facilities</option>
      @foreach($facilities as $facility)
      <option value="{{$facility->getId()}}">{{$facility->getName()}}</option>
      @endforeach
    </select>
    <label for="facility_id">Facilities</label>
    @if ($errors->has('facility_id'))
      <span class="red-text">{{ $errors->first('facility_id')}}</span>
    @endif
  </div>