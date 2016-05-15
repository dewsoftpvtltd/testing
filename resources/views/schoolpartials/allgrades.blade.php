<div class="card-panel white">
          <span class="blue-grey-text">Grades in {{$school->getName()}}<br>
          @foreach($grades as $grade)
              <span class="blue-text"><small>{{$grade->getName()}} <span class="blue-grey-text">{{$grade->getSession()}}</span></small><br></span></span>
              
          @endforeach
        </div>