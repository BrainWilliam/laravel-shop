<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EmailVerificationsController extends Controller
{
    public function verify(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        if(!$email || !$token){
            throw new InvalidRequestException('参数缺少');
        }
        if(Cache::get('email_verified_'.$email) != $token){
            throw new InvalidRequestException('验证失败');
        }
        if(!$user = User::where('email',$email)->first()){
            throw new InvalidRequestException('用户存在');
        }
        Cache::forget('email_verified_'.$email);
        $user->update(['email_verified'=>1]);
        return view('pages.success',['msg'=>'邮箱验证成功！']);
    }
    public function send(Request $request){
        $user = $request->user();
        if($user->email_verified){
            throw new InvalidRequestException('邮箱已经验证过');
        }
        $user->notify(new EmailVerificationNotification());
        return view('pages.success',['msg'=>'邮件已经发送']);
    }
}
