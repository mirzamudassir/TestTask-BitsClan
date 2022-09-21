<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Http\Controllers\ImageController;

class MainController extends Controller
{
    function login(){
        return view('/auth/login');
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:16'
        ]);

        $userProfile= Admin::where('email', '=', $request->email)->first();
        if(!$userProfile){
            return back()->with('fail', 'Invalid Credentials');
        }else{
            if(Hash::check($request->password, $userProfile->password)){
                $request->session()->put('loggedUser', $userProfile->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail', 'Invalid Credentials');
            }
        }
    }


    function dashboard(){
        $imageController= new ImageController;
        $imageData= $imageController->showImages();

        $userData= ['LoggedUserInfo'=>Admin::where('id', '=', session('loggedUser'))->first(),
                    'imageData'=>$imageData
                    ];
        
        return view('admin.dashboard', $userData);
    }

    function editProfile($id){
        $admin= Admin::find($id);
        return view('admin.editProfile', compact('admin'));
    }

    function updateProfile(Request $request, $id){
        //validate the input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:16'
        ]);

        $currentRecord= Admin::find($id);
        $currentRecord->name= $request->name;
        $currentRecord->email= $request->email;
        $currentRecord->password= Hash::make($request->password);

        $profileUpdated= $currentRecord->save();

        if($profileUpdated){
            return back()->with('success', 'Profile Updated Successfully.');
        }else{
            return back()->with('fail', 'Something went wrong.');
        }
    }

    function logout(){
        if(session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect('/auth/login');
        }
    }
}
