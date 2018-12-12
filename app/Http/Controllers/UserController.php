<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ViewComposingController;
use Image;
use App\Helpers\ApiRequestData;

class UserController extends ViewComposingController
{
    //
    
    public function getUserRegistration() {
        $this->viewData['title'] = "Registration Page";
        return $this->buildTemplate('registration');
    }
    
    public function postUserRegistration(Request $req) {
        
//        dd($req->all());
//        dd($req->get('name'));
        
        $validation = $req->validate([
            'name' => 'required',
            'user_name' => 'required|min:5|max:10',
            'email' => 'required',
            'password' => 'required'
        ]);
        
//        dd($req->all());
        
//        dd($validation);
        
        $parameters['name'] = $req->get('name');
        $parameters['username'] = $req->get('user_name');
        $parameters['email'] = $req->get('email');
        $parameters['password'] = sha1($req->get('name'));
        $parameters['gender'] = $req->get('gender');
        $parameters['dob'] = $req->get('dob');
        $parameters['country'] = $req->get('country');
//        dd($parameters);
        
//        dd($req->file('profile_pic'));
//        dd(public_path('/'));
        if(!is_dir(public_path('/users'))){
            mkdir(public_path('/users'));
        }
//        dd($req->get('username'));
        
        if (!is_dir(public_path('/users/' . $parameters['username']))) {
//            dd('here');
            mkdir(public_path('/users/' . $parameters['username']));
        }
        
//        dd(!empty($req->file('profile_pic')));
        
        if(!empty($req->file('profile_pic'))){
//            $filename = $req->file('profile_pic');
            $filename = $req->get('user_name') . '.' . $req->file('profile_pic')->getClientOriginalExtension();
//            dd($filename);
            $image = Image::make($req->file('profile_pic')->path());
//            dd($image);
            $imagePath = public_path('/users/'.$parameters['username'].'./'.$filename);
            $image->resize(200,200);
            $image->save($imagePath);
        }
        
        $parameters['image'] = $filename;
        
        $api_request_data = new ApiRequestData('user','addUser',$parameters);
        dd($api_request_data);
        
    }
    
}
