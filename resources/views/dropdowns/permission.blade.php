 <div class="input-field col s12 m6 l6">
    <select name="permission_id" id="permission_id" value="{{old('permission_id')}}">
      <option value="" disabled selected>Choose your Permission</option>
      @foreach($permissions as $permission)
      <option value="{{$permission->getId()}}">{{$permission->getName()}}</option>
      @endforeach
    </select>
    <label for="permission_id">Permission</label>
    @if ($errors->has('permission_id'))
      <span class="red-text">{{ $errors->first('permission_id')}}</span>
    @endif
  </div>