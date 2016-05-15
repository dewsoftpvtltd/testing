<div class="card-panel white">
          <span class="blue-grey-text">Family Members of {{$user->getName()}}<br>
          @foreach($family as $member)
          <div> <b>{{$member->getRelationship()}}</b></div>
          <div> <small>Name : {{$member->getFamilyMemberName() }}{{ $member->getFamilyMemberInverseName()}}</small></div>
      
          @endforeach
          </span>
        </div> 