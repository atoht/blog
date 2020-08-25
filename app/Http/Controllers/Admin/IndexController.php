<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Model\Users;
use Illuminate\Support\Facades\Crypt;

class IndexController extends CommonController
{
    public function index() {
        return view('admin.index');
    }

    public function info() {
        return view('admin.info');
    }

    public function pass() {
        if($input = Request()->all()) {
            // dd($input);
            //验证规则
            $rules = [
                'password'=>'required|between:6,20|confirmed'
            ];
            $message = [
                'password.required'=>'新密码不能为空',
                'password.between'=>'新密码必须在6-20位',
                'password.confirmed'=>'新密码和确认密码不一致'
            ];
            $validator = Validator::make($input, $rules, $message);
            if(!$validator->fails()) {
                $users = new Users();
                $sessionUser = session('user');
                $user = $users->getUser($sessionUser[0]['name']);
                $_password = Crypt::decrypt($user[0]['password']);
                echo $_password;
                if($input['password_o'] == $_password) {
                    
                }else {
                    return back()->withErrors('errors', '原密码错误');
                }
            }else {
                //返回错误信息
                return back()->withErrors($validator);
            }
        }else {
            return view('admin.pass');
        }
    }
}
