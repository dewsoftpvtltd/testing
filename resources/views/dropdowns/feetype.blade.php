 <div class="input-field col s12 m6 l6">
    <select name="feetype_id" id="feetype_id" value="{{old('feetype_id')}}">
      <option value="" disabled selected>Choose your Fee Type</option>
      @foreach($feetypes as $feetype)
      <option value="{{$feetype->getId()}}">{{$feetype->getName()}}</option>
      @endforeach
    </select>
    <label for="feetype_id">Fee Type</label>
    @if ($errors->has('feetype_id'))
      <span class="red-text">{{ $errors->first('feetype_id')}}</span>
    @endif
  </div>