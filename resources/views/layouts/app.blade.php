<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skoolum version 2.5</title>
  <meta name="_token" content="{!! csrf_token() !!}"/>
  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- import mdi design icons -->
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialdesignicons.min.css')}}" />
        <!--my own things-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/main.css')}}" />
  
</head>
<body>
<div id="wrapper">
        @include('layouts.partials.navigation')
        @include('layouts.partials.loader')
    <div class="container" id="content">
        @if (Session::has('message'))
            <div class="chip">
              {!! Session::get('message') !!}
              <i class="material-icons">close</i>
            </div>
        @endif
        @yield('content')
    </div>


@include('layouts.partials.footer')
</div>
</body>
      
      <script src="{{asset('js/jquery-2.2.2.min.js')}}"></script>
      <script src="{{asset('js/materialize.min.js')}}"></script>
      <script src="{{asset('js/init.js')}}"></script>
       <script type="text/javascript">
        $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
</script>
    

</html>