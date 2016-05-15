  <div class="card-panel white">
          <span class="orange-text" style="font-size: 40px;">{{$school->getName()}}</span>
          </span>
          <div class="blue-grey-text"><small>
              @foreach($address as $addr)
              {{$addr->getAddress()}}, {{$addr->getCity()->getName()}}
              @endforeach
          </small></div>
        </div>