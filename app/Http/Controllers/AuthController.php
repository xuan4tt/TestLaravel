<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests\Validate_AuthRegistration;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('index');
    }
    public function login(Request $request)
    {
        $request = $request->all();
        $email = $request['email'];
        $password = $request['password'];
        if (isset($request['remember'])) {
            setcookie("email", $email);
            setcookie("password", $password);
        } else {
            setcookie("email", "", time() - 3600);
            setcookie("password", "", time() - 3600);
        }
        $auth = Users::where('email', $email)->first();
        
        if ($auth && password_verify($password, $auth->password)) {
            $_SESSION['role'] = $auth->role;
            $_SESSION['id'] = $auth->id;
            $_SESSION['name'] = $auth->name;
            $_SESSION['email'] = $auth->email;
            if($auth->role == 2){
                return redirect()->route('market');
            }
            else{
                return redirect()->route('admin');
            }
            
        }
        return redirect()->route('index')->with('thongbaoloi', 'Sai tài khoản hoặc mật khẩu');
    }

    public function registration(Validate_AuthRegistration $request)
    {
       $request = $request->all();
       unset($request['_token']);
       $email = $request['email'];
       $check = Users::where('email', $email)->first();
       if(!isset($check)){
           $user = new Users;
           $user->name = $request['name'];
           $user->email = $request['email'];
           $user->password = password_hash($request['password'], PASSWORD_DEFAULT);
           $user->save();
       }
       return redirect()->route('index')->with('thongbao', 'Thành công');
    }
    public function checkMail(Request $request){
        $request = $request->all();
        $email = $_GET['email'];
        $check = Users::where('email', $email)->first();
        if(isset($check)){
            $result = json_encode(false);
        }
        else{
            $result = json_encode(true);
        }
        return $result;
    }
    public function logout()
    {
        session_destroy();
        return redirect()->route('index');
    }
}
