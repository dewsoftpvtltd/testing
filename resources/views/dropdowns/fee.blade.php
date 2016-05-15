 <div class="input-field col s12 m6 l6">
    <select name="fee_id" id="fee_id" value="{{old('fee_id')}}">
      <option value="" disabled selected>Choose your Fee</option>
      @foreach($fees as $fee)
      <option value="{{$fee->getId()}}">{{$fee->getName()}}</option>
      @endforeach
    </select>
    <label for="fee_id">Fee</label>
    @if ($errors->has('fee_id'))
      <span class="red-text">{{ $errors->first('fee_id')}}</span>
    @endif
  </div>