<div class="card-panel white">
          <span class="blue-grey-text">Interests of {{$user->getName()}}<br>
          @foreach($interests as $interest)
          <div> <b>{{$interest->getName()}}</b></div>
          <div> <small>Description : {{$interest->getDescription()}}</small></div>
          @endforeach
          </span>
        </div> 