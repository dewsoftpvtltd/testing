<div class="card-panel white">
          <span class="blue-grey-text">Contact Details of {{$user->getName()}}<br>
          @foreach($contacts as $contact)
          <div> <b>{{$contact->getName()}} Contact</b></div>
          <div> <small>Email :{{$contact->getEmail()}}</small></div>
          <div> <small>Phone : {{$contact->getPhone()}}</small></div>
          <div> <small>Fax : {{$contact->getFax()}}</small></div>
          @endforeach
          </span>
        </div> 