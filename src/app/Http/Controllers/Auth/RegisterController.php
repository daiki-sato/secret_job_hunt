<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email_confirmation' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:6'],
            'email_confirmation' => [
                'same:email',
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verify_token' => base64_encode($data['email']),
        ]);
        $email = new EmailVerification($user);
        Mail::to($user->email)->send($email);
        return $user;
    }

    public function register(Request $request)
    {
        event(new Registered($user = $this->create($request->all())));

        return view('auth.registered');
    }

    public function showForm($email_token)
    {
        // 使用可能なトークンか
        if (!User::where('email_verify_token', $email_token)->exists()) {
            return view('auth.main.register')->with('message', '無効なトークンです。');
        } else {
            $user = User::where('email_verify_token', $email_token)->first();
            // 本登録済みユーザーか
            if ($user->status == config('const.USER_STATUS.REGISTER')) //REGISTER=1
            {
                logger("status" . $user->status);
                return view('auth.main.register')->with('message', 'すでに本登録されています。ログインして利用してください。');
            }
            // ユーザーステータス更新
            $user->status = config('const.USER_STATUS.MAIL_AUTHED');
            if ($user->save()) {
                return view('auth.main.register', compact('email_token'));
            } else {
                return view('auth.main.register')->with('message', 'メール認証に失敗しました。再度、メールからリンクをクリックしてください。');
            }
        }
    }

    public function mainRegister(Request $request)
    {
        $user = User::where('email_verify_token', $request->email_token)->first();
        $user->status = config('const.USER_STATUS.REGISTER');
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->first_name_ruby = $request->first_name_ruby;
        $user->last_name_ruby = $request->last_name_ruby;
        $user->phone_number = $request->phone_number;
        $user->nickname = $request->nickname;
        $user->sex = $request->sex;
        $user->role_id = $request->role_id;
        $user->company = $request->company;
        $user->department = $request->department;
        $user->working_period = $request->working_period;
        $user->save();

        $this->guard()->login($user);

        return redirect()->route('home');
    }
}