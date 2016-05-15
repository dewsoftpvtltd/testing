 <div class="input-field col s12 m6 l6">
    <select name="city_id" id="city_id" value="{{old('city_id')}}">
      <option value="" disabled selected>Choose your City</option>
      @foreach($cities as $city)
      <option value="{{$city->getId()}}">{{$city->getName()}}</option>
      @endforeach
    </select>
    <label for="city_id">City</label>
    @if ($errors->has('city_id'))
      <span class="red-text">{{ $errors->first('city_id')}}</span>
    @endif
  </div>