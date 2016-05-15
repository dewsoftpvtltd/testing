<div class="card-panel white">
         
          @foreach($paymentsOfSchool as $payment) 
         <span class="orange-text">{{$payment->getType()}} Fee for {{$payment->getPackage()->getName()}} Package</span><br>
              
              <span class="blue-grey-text"><small>{{$payment->getCreatedAt()}}</small></span><br>
            <span class="blue-grey-text">Rs. {{$payment->getAmount()}}</span><br>
             <span class="blue-grey-text"><small>Account No. {{$payment->getAccount()}}</small></span>
                <span class="blue-grey-text"><small>
                @if($payment->getAccountedFor())
                (This Amount has already been account for.) 
                @else
                (This Amount has not been account for yet.) </small>
                @endif
                </span>
          @endforeach
        </div>