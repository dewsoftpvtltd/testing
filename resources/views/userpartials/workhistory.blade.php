<div class="card-panel white">
          <span class="blue-grey-text">Work Experience Details of {{$user->getName()}}<br>
          @foreach($experience as $exp)
          <div> <b>{{$exp->getName()}}</b></div>
          <div> <small>Address :{{$exp->getAddress()}}</small></div>
          <div> <small>Nature : {{$exp->getNature()}}</small></div>
          <div> <small>Position : {{$exp->getPosition()}}</small></div>
          <div> <small>Start Date : {{$exp->getStartDate()}}</small></div>
           <div> <small>End Date : {{$exp->getEndDate()}}</small></div>
          @endforeach
          </span>
        </div> 