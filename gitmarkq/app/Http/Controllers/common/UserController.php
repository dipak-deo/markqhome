<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Str;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->where('user_type','user')->get();
        // dd($user);
        return view('admin.user.index',compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'user_type' => 'required',
        ]);


        try{
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $data['uuid'] = Str::uuid();
            $data['username'] = $data['first_name'].' '.rand(1000, 9999);
            if($data['user_type'] == 'admin' && $data['user_type'] == 'admin'){
                $data['is_admin'] = 1;
            }
            $user = User::create($data);
    
            return redirect()->route('user.index')->with('success_message', 'User created successfully.');
        }catch(Exception $e){
            return back()->withInput()->withErrors($e->getMessage());
        }
       
    
    }

    public function edit($id)
    {
        $data = User::findorFail($id);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|unique:users,phone,'.$id,
            'user_type' => 'required',
        ]);

       try{
        $data = $request->all();
        $user = User::findOrFail($id);
        if(isset($data['image'])){
            User::deleteFile($user->image);
            $data['image'] = User::uploadFile($data['image']);
        }
       
        $user->update($data);

        return redirect()->route('user.index')->with('success_message', 'User updated successfully.');
       }catch(Exception $e){
        return back()->withInput()->withErrors($e->getMessage());
       }
    
    }

    public function admin_all()
    {
        $admin = User::where('user_type', 'admin')
        ->orWhere('user_type', 'super_admin')
        ->where('is_admin',1)->orderBy('id', 'desc')->get();
        return view('admin.user.admin', compact('admin'));
    }

    public function blocked_user()
    {
        $blocked = User::where('is_blocked',0)->orderBy('id', 'desc')->get();
        return view('admin.user.blocked_user', compact('blocked'));
    }

}
