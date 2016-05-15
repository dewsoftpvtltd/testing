 <div class="input-field col s12 m6 l6">
    <select name="room_id" id="room_id" value="{{old('room_id')}}">
      <option value="" disabled selected>Choose your Room No.</option>
      @foreach($rooms as $room)
      <option value="{{$room->getId()}}">{{$room->getName()}}</option>
      @endforeach
    </select>
    <label for="room_id">Room No.</label>
    @if ($errors->has('room_id'))
      <span class="red-text">{{ $errors->first('room_id')}}</span>
    @endif
  </div>