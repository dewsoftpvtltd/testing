<?php 
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Domain\Repositories\PaymentRecordRepository as Payments;
use App\Traits\SchoolPage;
use Illuminate\Http\Request;
use Auth;

class PaymentsViewComposer {
    use SchoolPage;

    protected $payments;
    protected $school;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(payments $payments)
    {
        $this->payments = $payments;
       //$this->school = $school;
    }

    public function compose(View $view) {
        if(Auth::user()){
           $data = $view->getData();
           $school = $data['school'];
        $paymentsOfSchool = $this->paymentsOfSchool($school,$this->payments);
      

        $view->with("paymentsOfSchool", $paymentsOfSchool);
       
        
        }
    }
}