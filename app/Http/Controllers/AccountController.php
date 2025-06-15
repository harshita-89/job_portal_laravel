<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AccountController extends Controller
{
    // this method will show user registration page
    public function registration(){
        return view('front.account.registration');
    }
  
    public function processRegistration(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',   
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required',
        ]);
        if($validator->passes()){
            //saving data into the database 
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // $user->confirm_password = $request->confirm_password;
            $user->save();

            session()->flash('success','you have successfully registered.');
            
            
            return Response()->json([
                'status' => true,
                'errors' =>[]
            ]);
        } else{
            return Response()->json([
                'status' => false,
                'errors' =>$validator->errors()
            ]);
        }
    }
      // this method will show user login page
    public function login(){
        return view('front.account.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request-> all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){
            if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password])){
                return redirect()->route('account.profile');
            } else{
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }

        } else {
            return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }
    // this method will show user profile page
    public function profile(){
       
        $id = Auth::user()->id;
       
        $user = User::where('id',$id)->first();
        // dd($user);
       
        return view('front.account.profile',[
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(),[

            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id' //required unique email, checks the email column for duplicate emails except the logged in user id
        ]);

        if($validator-> passes()){ // if validation passes updating the record

            $user = User::find ($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            session()->flash('success','Profile updated successfully');
            
            return redirect()->route('account.profile');
            
            // was redirecting the page to update-profile and showing the json reponse as answer
            // return response()->json([
            //     'status' => true,
            //     'errors' => []
            // ]);

        } else{
            return redirect()->route('account.profile')
                     ->withErrors($validator)
                     ->withInput();

            // return response()->json([
            //     'status' => false,
            //     'errors' => $validator->errors()
            // ]);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
    
}
