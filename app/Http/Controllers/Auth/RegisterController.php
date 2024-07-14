<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){

            // 記載：新規登録情報のバリデーション機能実装
        $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|unique:users|email|min:5|max:40|string|mail',
            'password' => 'required|confirmed|alpha_num|min:8|max:20',
        ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            // 記述：ユーザー情報作成
            // メモ：bcryptが暗号化処理の記述
            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            // 記述：セッションを使用してユーザー名を表示させる記述
            $request->session()->put('username', $username);
            $mail->session()->put('mail',$mail);
            $password->session()->put('password', $password);
            // return redirect('added');
            return redirect('/added')->with('username',$username);
        }
        return view('auth.register');
    }
        public function added(){
            $value = session('username');
            return view('auth.added',compact('value'));
    }
// 記載：登録完了時ユーザー名の表示
    public function users(Request $request)
    {
        $name = $request->input('username');
        return back();
    }



    // 記述：下記（）に$idと追記
    // これは違う？public function added($id){
        // $user = user::where('id',$id)->first();
        // return view('auth.added',['user'=>$user]);
        // public function added(){
        // $user = user::where('id',$id)->first();
        // return view('auth.added');
    // }
}
