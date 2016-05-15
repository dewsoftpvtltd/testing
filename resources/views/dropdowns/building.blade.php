 <div class="input-field col s12 m6 l6">
    <select name="building_id" id="building_id" value="{{old('building_id')}}">
      <option value="" disabled selected>Choose your Building</option>
      @foreach($buildings as $building)
      <option value="{{$building->getId()}}">{{$building->getName()}}</option>
      @endforeach
    </select>
    <label for="building_id">Building</label>
    @if ($errors->has('building_id'))
      <span class="red-text">{{ $errors->first('building_id')}}</span>
    @endif
  </div>