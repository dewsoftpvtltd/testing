 <div class="input-field col s12 m6 l6">
    <select name="role_id" id="role_id" value="{{old('role_id')}}">
      <option value="" disabled selected>Choose your Role</option>
      @foreach($roles as $role)
      <option value="{{$role->getId()}}">{{$role->getName()}}</option>
      @endforeach
    </select>
    <label for="role_id">Role</label>
    @if ($errors->has('role_id'))
      <span class="red-text">{{ $errors->first('role_id')}}</span>
    @endif
  </div>