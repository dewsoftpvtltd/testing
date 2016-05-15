<div class="card-panel white">
          <span class="blue-grey-text">Students in {{$school->getName()}}<br>
          @foreach($students as $student)
           
              <span class="red-text"><small>{{$student->getUser()->getName()}} <span class="blue-grey-text">({{$student->getGrade()->getName()}} Section {{$student->getSection()->getName()}} Teacher {{$student->getIncharge()->getUser()->getName()}})</span></small><br></span>
              
          @endforeach
        </div>