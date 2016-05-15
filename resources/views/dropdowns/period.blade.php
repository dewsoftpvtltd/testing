 <div class="input-field col s12 m6 l6">
    <select name="period_id" id="period_id" value="{{old('period_id')}}">
      <option value="" disabled selected>Choose your Lecture/Class/Session</option>
      @foreach($periods as $period)
      <option value="{{$period->getId()}}">{{$period->getName()}}</option>
      @endforeach
    </select>
    <label for="period_id">Lecture/Class/Session</label>
    @if ($errors->has('period_id'))
      <span class="red-text">{{ $errors->first('period_id')}}</span>
    @endif
  </div>