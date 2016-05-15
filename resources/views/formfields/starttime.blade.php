<div class="input-field col s12 m6 l8">
<input type="text" id="starttime" class="validate" name="starttime" value="{{old('starttime')}}">
<label data-error="Sorry!" data-success="Good!" for="starttime">Starting Time</label>
@if ($errors->has('starttime'))
<span class="red-text">{{ $errors->first('starttime')}}</span>
@endif
</div>