 <div class="input-field col s12 m6 l6">
    <select name="addresstype_id" id="addresstype_id" value="{{old('addresstype_id')}}">
      <option value="" disabled selected>Choose your Address Type</option>
      @foreach($addresstypes as $addresstype)
      <option value="{{$addresstype->getId()}}">{{$addresstype->getName()}}</option>
      @endforeach
    </select>
    <label for="addresstype_id">Address Type</label>
    @if ($errors->has('addresstype_id'))
      <span class="red-text">{{$errors->first('addresstype_id')}}</span>
    @endif
  </div>