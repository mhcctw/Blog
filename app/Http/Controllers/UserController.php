<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{

    public function register(Request $request){

        $inputFields = $request -> validate([
            'name' => ['required', 'min:3', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
            'password2' => []
        ]);

        if($inputFields['password'] !== $inputFields['password2']){
            $errors = new MessageBag(['password2' => 'Password mismatch']);
            return redirect()->back()->withErrors($errors);
        }

        $inputFields['password'] = bcrypt($inputFields['password']);
        $user = User::create($inputFields);
        auth()->login($user);

        return redirect('/');

    }// end register method


    public function login(Request $request){

        $inputFields = $request -> validate([            
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if( auth()->attempt([
            'email' => $inputFields['email'],
            'password' => $inputFields['password']
        ]) )
        {
            $request->session()->regenerate();
            return redirect('/');
        }else{
            $errors = new MessageBag(['LogError' => 'Check for errors in email and password']);
            return redirect()->back()->withErrors($errors);
        }

        return redirect('/login');
        
        
    }// end login method


    public function logout(){
        auth()->logout();
        return redirect('/');
    }// end logout method

    public function profile(){

        $user = Auth::user();
        return view('profile.profile', ['user' => $user]);

    }//end profile method

    public function edit(){

        $user = Auth::user();
        return view('profile.edit', ['user' => $user]);

    }//end edit method

    public function saveEditProfile(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('assets/images/avatars/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/images/avatars/'),$filename);

            $data['photo'] = $filename;
        }

        $data->save();

        return view('profile.edit', ['notification' => 'Profile Updated Successfully', 'user' => $data]);
        
    }//end saveEditProfile method
}
