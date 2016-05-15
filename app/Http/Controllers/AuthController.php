<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Domain\Entities\User;
use App\Domain\Entities\Country;
use App\Domain\Repositories\CountryRepository;
use App\Domain\ValueObjects\Name;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;
use Validator;
class AuthController extends Controller
{
    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function getSignup(CountryRepository $countries){
        $countries = $countries->all();
        return view('auth.signup',[
            'countries'=>$countries
            ]);
    }

    public function postSignup(Request $request,CountryRepository $countries){
        //dd($request);
        $this->validate($request, [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'usertype'=>'required',
            'email' => 'required|email|max:255|unique:App\Domain\Entities\User',
           'password' => 'required|min:6|confirmed',
           'country_id' =>'required'
            ]);
            $fname = $request['fname'];
            $lname = $request['lname'];
            $name = new Name($fname,$lname);
            
            $country = $countries->find($request['country_id']);//dd($country);
            $email = $request['email'];
            $usertype = $request['usertype'];
            $password = bcrypt($request['password']);
       
        $a = new User($name,$email,$password,$usertype,$gender=1,$country);
        \EntityManager::persist($a);
        \EntityManager::flush($a);
         return redirect()->route('welcome')->with('message', 'You have signed up successfully!');
    }

    public function getSignin(){
        session()->flash('message', 'Welcome to Skoolum!');
       // $data = Session::all();dd($data);
        return view('auth.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
                'email' =>'required',
                'password'=>'required'
            ]);
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back();
        };
       session()->flash('message', 'You have signed in successfully!');//
        return redirect()->route('home');
    }
    public function getSignout(){
        Auth::logout();

        session()->flash('message', 'You have signed out successfully!');
        $data = Session::all();//dd($data);
        return redirect()->route('welcome',compact($data));
    }
    
}
