 <div class="input-field col s12 m6 l6">
    <select name="examination_id" id="examination_id" value="{{old('examination_id')}}">
      <option value="" disabled selected>Choose your Examination</option>
      @foreach($examinations as $examination)
      <option value="{{$examination->getId()}}">{{$examination->getName()}}</option>
      @endforeach
    </select>
    <label for="examination_id">Examination</label>
    @if ($errors->has('examination_id'))
      <span class="red-text">{{ $errors->first('examination_id')}}</span>
    @endif
  </div>