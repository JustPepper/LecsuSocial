<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = array(
            'password.confirmed'    => 'Las contraseñas no coinciden',
        );

        return Validator::make($data, [
            'alias'     => 'required|max:255|unique:usuario_usuario',
            'email'     => 'required|email|max:255|unique:usuario_usuario',
            'password'  => 'required|confirmed|min:6',
            'codigo'    => 'exists:usuario_usuario,codigo'
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {   
        if ($data['codigo']) {
            $referal_id = User::where('codigo', '=', $data['codigo'])->first()->id;
        }
        return User::create([
            'alias'       => $data['alias'],
            'email'       => $data['email'],
            'referido_id' => $referal_id,
            'tipo_id'     => 2,
            'password'    => bcrypt($data['password']),
        ]);
    }
}
