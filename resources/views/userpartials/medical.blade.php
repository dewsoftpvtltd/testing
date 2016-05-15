<div class="card-panel white">
          <span class="blue-grey-text">Medical Issues of {{$user->getName()}}<br>
          @foreach($medicalissues as $issue)
          <div> <b>{{$issue->getName()}}</b></div>
          <div> <small>Description : {{$issue->getDescription()}}</small></div>
          @endforeach
          </span>
        </div> 