@extends('layouts.app')

@section('content')

<div class="row">
<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large red">
                <i class="large material-icons">mode_edit</i>
              </a>
              <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
              </ul>
  </div>
      <div class="col s12 m12 l12">
        <div class="card-panel white">
          <span class="blue-grey-text">{{$user->getName()}}'s Schools
          </span>
        </div>
        @foreach($schools as $school)
        <div class="card-panel white">
          <span class="blue-grey-text">{{$school->getName()}}<br>
          <span style="font-size: 9px; color: grey;">{{$school->getCreatedAt()}}</span>
          </span>
          <div class="card-panel white">
         <span class="blue-grey-text">{{$user->getName()}}'s Grade
          </span>
           <span class="blue-grey-text">{{$user->getName()}}<br>
        </div>
        </div>

         @endforeach
      </div>
    </div>
     </div>
</div>

@endsection