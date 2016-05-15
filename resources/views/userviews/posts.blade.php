@extends('layouts.app')

@section('content')
<div class="row">
      <div class="col s12 m12 l12">
        
        <div class="card-panel white">
          <span class="blue-grey-text">
          {{$user->getName()}}'s Posts
          </span>
        </div>

        @include('userpartials.allposts')
      </div>
    </div>

                @include('userpartials.userPermissions')
            </div>
        </div>
    </div>
</div>
@endsection