<div class="card-panel white">
          <span class="blue-grey-text">Buildings of {{$school->getName()}}<br>
          @foreach($buildingaddress as $building)
           
              <span class="orange-text">{{$building->getBuilding()->getName()}}<br></span>
            <span class="blue-grey-text"><small>{{$building->getAddress()}}, {{$building->getCity()->getName()}}</small><br></span><span class="green-text"> Rooms in {{$building->getBuilding()->getName()}}</span><br>
            @foreach($building->getBuilding()->getRoom() as $room)
            <span class="blue-grey-text"><small>{{
                      $room->getName()
              }}: @foreach($room->getFacility() as $facility)
              {{$facility->getName()}},
              @endforeach<br></small>@endforeach
          
          <span class="green-text"> Halls in {{$building->getBuilding()->getName()}}</span><br>
            @foreach($building->getBuilding()->getHall() as $hall)
            <span class="blue-grey-text"><small>{{
                      $hall->getName()
              }}<br></small>@endforeach
         
          @endforeach
        </div>