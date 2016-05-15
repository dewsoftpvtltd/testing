<div class="card-panel white">
          <span class="blue-grey-text">Courses Offered in {{$school->getName()}}<br>
          @foreach($courses as $course)
           
              <span class="orange-text">{{$course->getName()}}<br></span>
            <span class="blue-grey-text"><small>Session: {{$course->getSession()}}, <br>
                                                 Start : {{$course->getStartDate()->format('Y-m-d')}},<br>
                                                 End : {{$course->getEndDate()->format('Y-m-d')}}</small><br></span>
          @endforeach
        </div>