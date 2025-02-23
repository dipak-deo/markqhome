<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function admin_login()
    {
        return view('auth.admin.login');
    }

    public function admin_login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            if(Auth::user()->is_admin == 1 && Auth::user()->is_blocked == 0) {
            return redirect()->intended(route('admin.index'));
            } else {
                Auth::logout();
                return back()->with('error_message', 'You cannot access this system, Please contact Admin Team');
            }
        }

        return back()->with('error_message', 'Invalid credentials');
    }

    public function updateProfile()
    {
        return view('auth.admin.profile');
    }
    public function updateProfileSubmit(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required'
        ]);
        $user = User::find(auth()->user()->id);
       

        $credentials = $request->only('first_name','last_name','phone','date_of_birth','address','image');
        if($request->hasFile('image')){
            $image = $request->file('image');
            User::deleteFile($user->image);
            $credentials['image'] = User::uploadFile($image);
        }
    //    ['password'] = bcrypt(12);
        // dd($credentials);
        $user->update($credentials);
        return redirect()->route('admin.profile')->with('success_message','Profile Update Succesfully');
    
    }

    public function changePassword()
    {
        return view('auth.admin.change_password');
    }
    public function changePasswordSubmit(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::find(auth()->user()->id);
        if(!Hash::check($request->old_password,$user->password)){
            return back()->with('error_message','Old password is incorrect');
        }elseif($request->old_password == $request->password){
            return back()->with('error_message','New password cannot be same as old password');
        }else{
            $data['password'] = Hash::make($request->password);
            $user->update($data);
            return back()->with('success_message','Password changed successfully');
        }
    }

   

    public function logout()
    { 
        Auth::logout();
        return redirect()->route('login')->with('success_message','Logout Succesfully');
    }
}
