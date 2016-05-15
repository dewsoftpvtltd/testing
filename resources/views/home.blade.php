@extends('layouts.app')

@section('content')

   <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel white">
          <span class="blue-grey-text">
          You are logged in now!
          </span>
        </div>
        @include('userpartials.contacts')
        @include('userpartials.addresses')
        @include('userpartials.workhistory')
        @include('userpartials.interests')
        @include('userpartials.medical')
        @include('userpartials.family')

      </div>

</div>
@endsection
