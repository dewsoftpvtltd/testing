<div class="card-panel white">
                @foreach($permissions as $p)
                <div class="btn btn-primary"> {{$p->getName() }}  </div>
                @endforeach </div>