<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\Users;

use function GuzzleHttp\Promise\all;

require_once '../resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login() {
        if($input = Request()->all()) {
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code']) != $_code) {
                return back()->with('msg' , '验证码错误');
            }

            $users = new Users();
            $user = $users->getUser($input['user_name']);
            if($user->isEmpty()) {
                return back()->with('msg' , '用户名密码错误');
            }
            if($user[0]['name'] != $input['user_name']
                || Crypt::decrypt($user[0]['password']) != $input['user_pass']) {
                return back()->with('msg' , '用户名密码错误');
            }

        }
        return view('admin.login');
    }
    public function code() {
        $code = new \Code;
        return $code->make();
    }

    public function crypt() {
        $str = "admin1234";
        echo Crypt::encrypt($str);
    }
}
