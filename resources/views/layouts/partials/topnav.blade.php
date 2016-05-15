   @if (Auth::check())
                <li><a href="{{ route('welcome') }}" class="tooltipped" data-position="bottom" data-delay="1000" data-tooltip="Timeline"><i class="mdi mdi-history"></i></a></li>
                       <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('posts') }}">Posts</a></li>
                    <li><a href="{{ route('student.schools') }}">School</a></li>
             
    
       
            @endif 
          @if(Auth::check() && Auth::user()->getUserType() === 'school' && Request::segment(3))
                    <li><a href="{{ route('school.payments',['school'=>Request::segment(3)]) }}">Payments</a></li>
          @endif
               @if (Auth::guest())
        <li><a href="{{ route('auth.signin') }}">Login</a></li>
        <li><a href="{{ route('auth.signup')  }}">Register</a></li>
                @else
       
        <li>  <a href="#" >{{ Auth::user()->getAuthIdentifierName() }}</a></li>
         <!-- Dropdown Trigger -->
        <li><a class='dropdown-button light-blue lighten-1' href='#' data-activates='dropdown'><i class="material-icons">settings_applications</i></a>

        <!-- Dropdown Structure -->
        <ul id='dropdown' class='dropdown-content'>
          <li><a href="#!">Settings</a></li>
          <li><a href="#!">Picture</a></li>
          <li class="divider"></li>
          <li><a href="{{ route('auth.signout') }}">Logout</a></li>        </ul>
        </li>

       
      
        @endif