<div class="card-panel white">
          <span class="blue-grey-text">Contacts of {{$school->getName()}}<br>
          @foreach($contacts as $contact)
           
              <span class="orange-text">{{$contact->getName()}}<br></span>
            <span class="blue-grey-text"><small>Phone: {{$contact->getPhone()}}, <br>
                                                 Email: {{$contact->getEmail()}}</small><br></span>
          @endforeach
        </div>