<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        // 取得 email/username 欄位
        $value = request()->input('email');

        // 根據輸入的資料判斷欄位
        $fieldType = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 將轉換後的欄位放回 request 中
        request()->merge([$fieldType => $value]);

        // 傳回欄位名稱
        return $fieldType;

        //這裡我們使用 filter_var 來判斷使用者輸入的資料是否為 Email，若為 Email 則使用 Email 加上密碼認證，若不是 Email 則使用帳號名稱加上密碼來認證。

        //laravel內建login的email欄位一定要填寫東西
    }
}
