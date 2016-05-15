 <div class="input-field col s12 m6 l6">
    <select name="country_id" id="country_id" value="{{old('country_id')}}">
      <option value="" disabled selected>Choose your Country</option>
      @foreach($countries as $country)
      <option value="{{$country->getId()}}">{{$country->getName()}}</option>
      @endforeach
    </select>
    <label for="country_id">Country</label>
    @if ($errors->has('country_id'))
      <span class="red-text">{{ $errors->first('country_id')}}</span>
    @endif
  </div>