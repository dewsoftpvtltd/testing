 <div class="input-field col s12 m6 l6">
    <select name="decision_plan_id" id="decision_plan_id" value="{{old('decision_plan_id')}}">
      <option value="" disabled selected>Choose your Decision Plan</option>
      @foreach($decision_plans as $decision_plan)
      <option value="{{$decision_plan->getId()}}">{{$decision_plan->getName()}}</option>
      @endforeach
    </select>
    <label for="decision_plan_id">Decision Plan</label>
    @if ($errors->has('decision_plan_id'))
      <span class="red-text">{{ $errors->first('decision_plan_id')}}</span>
    @endif
  </div>