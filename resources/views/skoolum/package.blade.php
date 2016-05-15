 <div class="row">
      
          @foreach($packages as $package)
         
        <div class="col s12 m6 l4">
       <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{{asset('images/image-'.$package->getId().'.jpg')}}">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">{{$package->getName()}} Package<i class="material-icons right">more_vert</i></span>
              <p><h4>Rs. {{$package->getPrice()}}</h4>per student fee</p>
            </div>
          
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">{{$package->getName()}} Package<i class="material-icons right">close</i></span>
              <p>{{$package->getDescription()}}.</p>
            </div>

              <div class="card-action">
                <a href="{{route('school.payment',['package'=>$package->getId(),'school'=>Request::segment(3)])}}">Use {{$package->getName()}}</a>
                <a href="#">Learn More..</a>
              </div>
            
  </div>
  </div>
     @endforeach     
          
    
  </div>    