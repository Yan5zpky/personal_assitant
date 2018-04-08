<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 将用户重定向到Github认证页面
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * 从Github获取用户信息.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        if(!User::where('github_id',$user->id)->first()){
            $userModel = new User;
            $userModel->github_id = $user->id;
            $userModel->email = $user->email;
            $userModel->name = empty($user->name) ? $user->nickname : $user->name;
            $userModel->avatar = $user->avatar;
            $userModel->save();
        }

        $userInstance = User::where('github_id',$user->id)->firstOrFail();
        Auth::login($userInstance);
        return redirect('/');
    }
}
