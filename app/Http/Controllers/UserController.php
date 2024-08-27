<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Contracts\PostService;
use App\Contracts\UserService;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Services\PostServiceDefault;
use App\Services\UserServiceDefault;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $postService;
    protected $userService;

    public function __construct(PostService $postService, UserService $userService)
    {
        $this->postService = $postService;
        $this->userService = $userService;
    }

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

    public function profile(User $user){

        // $userAuth = Auth::user();
        $posts = $user->UsersPosts;
        $ShowPosts = $this->postService->ShowPosts($posts, $user);        

        return view('profile.profile', ['user' => $user, 'posts' => $ShowPosts] );

    }//end profile method

    public function edit(){

        $user = Auth::user();
        return view('profile.edit', ['user' => $user]);

    }//end edit method (opens view to edit)

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

    public function changePassword(Request $request){

        $inputFields = $request -> validate([
            'password' => ['required', 'min:8'],
            'newPassword' => ['required', 'min:8'],
            'newPassword2' => [],
        ]);

        if($inputFields['newPassword'] !== $inputFields['newPassword2']){
            $errors = new MessageBag(['newPassword2' => 'Password mismatch']);
            return redirect()->back()->withErrors($errors);
        }

        $user = Auth::user();
        $data = User::find($user->id);

        if(!Hash::check($inputFields['password'], $data->password)){
            $errors = new MessageBag(['password' => 'Wrong Password']);
            return redirect()->back()->withErrors($errors);            
        }
        
        $data->password = bcrypt($inputFields['newPassword']);
        $data->save(); 

        
        $posts = $user->UsersPosts;
        return view('profile.profile', ['user' => $user, 'posts' => $posts]);

    }//end changePassword method 

    public function search(Request $request){

        $inputFields = $request->validate([
            'searchText' => 'required'
        ]);

        $searchText = strip_tags($inputFields['searchText']);

        // $foundUsersOld = User::where('name', 'like', "%$searchText%")->get();           
        
        $foundUsers = $this->userService->FindSearch($searchText);

        return view('search', ['foundUsers' => $foundUsers, 'searchText' => $searchText]);

    }//end search method

    // Follow user button
    public function follow(Request $request){

        $user_id = $request['user_id'];
        $auth_user_id = Auth::user()->id;

        if(User::find($user_id)){

            // unfollow
            $Subscription = Subscription::where('user_id', $auth_user_id)->where('follow', $user_id)->get();

            if(count($Subscription)>0){

                Subscription::where('user_id', $auth_user_id)
                ->where('follow', $user_id)
                ->delete();

                $num = count(User::find($user_id)->subscribers);

                return response()->json(['text' => 'Follow','count' =>$num, 'error' => 0]);

            }else{// follow

                Subscription::create([
                    'user_id' => $auth_user_id,
                    'follow' => $user_id 
                ]);
                $num = count(User::find($user_id)->subscribers);

                return response()->json(['text' => 'Unfollow','count' =>$num, 'error' => 0]);
            } 

        }else{
            return response()->json(['error' => 1]);
        }

    }//end follow method

    public function followers(User $user){

        $foundUsers = $this->userService->FindFollowers($user);

        return view('profile.followers', ['foundUsers' => $foundUsers, 'user' => $user]);

    }

    public function follows(User $user){

        $foundUsers = $this->userService->FindFollows($user);

        return view('profile.follows', ['foundUsers' => $foundUsers, 'user' => $user]);

    }
}
