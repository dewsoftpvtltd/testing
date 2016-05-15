 <div class="input-field col s12 m6 l6">
    <select name="user_id" id="user_id" value="{{old('user_id')}}">
      <option value="" disabled selected>Choose your User</option>
      @foreach($users as $user)
      <option value="{{$user->getId()}}">{{$user->getName()}}</option>
      @endforeach
    </select>
    <label for="user_id">User</label>
    @if ($errors->has('user_id'))
      <span class="red-text">{{ $errors->first('user_id')}}</span>
    @endif
  </div>