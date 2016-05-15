 <div class="input-field col s12 m6 l6">
    <select name="term_id" id="term_id" value="{{old('term_id')}}">
      <option value="" disabled selected>Choose your Term</option>
      @foreach($terms as $term)
      <option value="{{$term->getId()}}">{{$term->getName()}}</option>
      @endforeach
    </select>
    <label for="term_id">Term</label>
    @if ($errors->has('term_id'))
      <span class="red-text">{{ $errors->first('term_id')}}</span>
    @endif
  </div>