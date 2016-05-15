@extends('layouts.app')

@section('content')

   <div class="row">
      <div class="col s12 m12 l12">
      
        <div>
       <div class="card-panel white">
          <span class="blue-grey-text">You have to pay a Registration Fee of Rs. {{$registrationFee}}/- for {{$school->getName()}}
        </div>
         
          
          <h4>Check Status of Your Payment</h4>
          <hr>
          <form class="col s12" method="post" action="{{ route('school.payment',['packageid'=>$packageid,'school'=>$school->getId()]) }}">
          {{ csrf_field() }}
           <div class="row">
        
         @include('formfields.account')
          @include('formfields.date')
          <input type="hidden" id="amount" name="amount" value="{{$registrationFee}}">
          <input type="hidden" id="packageid" name="packageid" value="{{$packageid}}">
          <input type="hidden" id="schoolid" name="schoolid" value="{{$school->getId()}}">
          </div>
           <button class="btn waves-effect waves-light" type="submit" name="action">Check Payment With Skoolum
            <i class="material-icons right">send</i>
          </button> 
          
        </form>
        </div>
        
      </div>
    </div>


@endsection