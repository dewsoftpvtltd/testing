<div class="card-panel white">
          <span class="blue-grey-text">Address Details of {{$user->getName()}}<br>
          @foreach($address as $addr)
          <div> <b>{{$addr->getAddress()}}, </b></div>
          <div> <small>{{$addr->getCity()->getName()}}, {{$addr->getState()->getName()}}, {{$addr->getState()->getCountry()->getName()}}.</small></div>
          @endforeach
          </span>
        </div> 