<?php

namespace App\Http\Controllers;

use App\HelperX;
use App\Systemsetting;
use App\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function doLogin(){
    	$username = request('username');
        $password = request('password');
        $crx      = ['username'=>$username, 'password'=>$password, 'active'=>1];
        if(auth()->attempt($crx)){
            return redirect()->to('dashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid User Information');
        }
    }

    public function changePassword(){


        if(!request()->has('confirmPassword')){
            $currentPassword = request('currentPassword');
            if(\Hash::check($currentPassword, \Auth::user()->password)){
              return response()->json(['error' => false, 'msg' => '']);
            }
            return response()->json(['error' => true, 'msg' => 'Current Password mismatch']);
        }else{
            $confirmPassword = request('confirmPassword');
            $hash = \Hash::make($confirmPassword);
            $user_id = \Auth::user()->id;
            \DB::table('users')->where('id', $user_id)->update(['password' => $hash]);
            
        }


    }

    public function getChangePasswordView(){
        return view('app.getChangePasswordView');
    }

    public function logout(){
        auth()->logout();
        return redirect()->to('/')->with('success', 'Successfully Logout!');
    }

    public function registerAdmin(){
        $check    = User::where('role', 1)->count();
        if($check){
            return redirect()->back()->with('error', 'You must not be serious!');
        }else{
           return view('app.register');
        }

    }

    public function system_store(){

        $datatablesTools = request('datatablesTools') == null ? 'disable' : 'enable';

        $appName       = request('appName');
        $appCopyRight  = request('appCopyRight');
        $appTextEditor = request('appTextEditor');
        $appPowerBy    = request('appPowerBy');


        $check = Systemsetting::count();

        if($check){
            //update
            $system    = HelperX::getSystem();
            $system->app_name = $appName;
            $system->powerby = $appPowerBy;
            $system->editor   = $appTextEditor;
            $system->foot_title = $appCopyRight;
            if (request()->file('appLogo')) {
                $system->logo =  HelperX::uplodFileThenReturnPath('appLogo');
            }
            $system->data_tools = $datatablesTools;
            $system->header_color = request('header_color');
            $system->save();
            return response()->json(["error"=>false, "msg"=>'Successfully added!']);
        }else{
            //create
            $system = new Systemsetting;
            $system->powerby = $appPowerBy;
            $system->app_name = $appName;
            $system->editor   = $appTextEditor;
            $system->foot_title = $appCopyRight;
            if (request()->file('appLogo')) {
                $system->logo =  HelperX::uplodFileThenReturnPath('appLogo');
            }
            $system->data_tools = $datatablesTools;
            $system->header_color = request('header_color');
            $system->save();
            return response()->json(["error"=>false, "msg"=>'Successfully added!']);
        }


    }

    public function system_refresh(){
        return redirect()->to('/')->with('success', 'You can login!');
    }

    public function dashboard(){
        return view('dashboard');
    }

	public function doRegister(){
        $fullname = request('fullname');
        $email    = request('email');
        $username = request('username');
        $password = request('password');
        $check    = User::where('role', 1)->count();
        if($check){
            //update
            $role_id = HelperX::createDeveloper();
            $u = User::where('role', 1)->first();
            $u->name = $fullname;
            $u->email = $email;
            $u->role  = $role_id;
            $u->password = bcrypt($password);
            $u->username = $username;
            $u->save();
            return response()->json(['error'=>false, 'msg'=>'Successfully Updated!']);

        }else{
            //create Role
            $role_id = HelperX::createDeveloper();
            //create one
            $u = new User;
            $u->name = $fullname;
            $u->email = $email;
            $u->role  = $role_id;
            $u->password = bcrypt($password);
            $u->username = $username;
            $u->save();
            return response()->json(['error'=>false, 'msg'=>'Successfully Created!']);
        }
    }

	public function updated(){
    	return redirect()->back()->with('success', 'Successfully! Updated');
    }

    public function refresh(){
    	return redirect()->back()->with('success', 'Successfully! refreshed!');
    }
}
