@foreach($posts as $post)
        <div class="card-panel white">
          <span class="blue-grey-text">{{$post->getTitle()}}<br>
          <span style="font-size: 9px; color: grey;">{{$post->getCreatedAt()}}</span>
          </span>
          <span style="font-size: 9px; color: grey;">
                  @if($teacher)
                    {{'Only a user who is a Teacher can edit this'}}
                  @elseif($manager)
                     {{'Managers will see this text'}}
                  @endif
                </span>
        </div>
         @endforeach