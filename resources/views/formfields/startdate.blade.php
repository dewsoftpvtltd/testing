<div class="input-field col s12 m6 l8">
<input type="text" id="startdate" class="validate" name="startdate" value="{{old('startdate')}}">
<label data-error="Sorry!" data-success="Good!" for="startdate">Starting Date</label>
@if ($errors->has('startdate'))
<span class="red-text">{{ $errors->first('startdate')}}</span>
@endif
</div>