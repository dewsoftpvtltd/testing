   @if (Auth::check())
                <li><a href="{{ url('/') }}" class="tooltipped" data-position="bottom" data-delay="1000" data-tooltip="Timeline"><i class="mdi mdi-history"></i></a></li>
                       <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/posts') }}">Posts</a></li>
                    <li><a href="{{ url('/schools') }}">School</a></li>
             
    
       
            @endif 
      
               @if (Auth::guest())
        <li><a href="{{ url('/signin') }}">Login</a></li>
        <li><a href="{{ url('/signup')  }}">Register</a></li>
                @else
       
        <li>  <a href="#" >{{ Auth::user()->getAuthIdentifierName() }}</a></li>

                <!-- Dropdown Trigger -->
        
          <li><a href="#!">Settings</a></li>
          <li><a href="#!">Picture</a></li>
          <li class="divider"></li>
          <li><a href="{{ route('auth.signout') }}">Logout</a></li>
      
        @endif