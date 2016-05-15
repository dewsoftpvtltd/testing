@if (Session::has('message'))
   <div class="chip">
    {!! Session::get('message') !!}
    <i class="material-icons">close</i>
  </div>
@endif
