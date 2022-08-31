<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'last_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Zａ-ｚＡ-Ｚぁ-んァ-ヶ一-龠]+$/u'],
            'first_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Zａ-ｚＡ-Ｚぁ-んァ-ヶ一-龠]+$/u'],
            'pseudonym_last_name' => ['required', 'string', 'max:50', 'regex:/^[ァ-ヶ一]+$/u'],
            'pseudonym_first_name' => ['required', 'string', 'max:50','regex:/^[ァ-ヶ一]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'email:filter,dns'],
            'telephone_number' => ['required', 'numeric', 'digits_between:8,11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'pseudonym_last_name' => $data['pseudonym_last_name'],
            'pseudonym_first_name' => $data['pseudonym_first_name'],
            'email' => $data['email'],
            'telephone_number' => $data['telephone_number'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
