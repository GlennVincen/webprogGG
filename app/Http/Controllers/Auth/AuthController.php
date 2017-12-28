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

    use AuthenticatesAndRegistersUsers;

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
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|alpha_num|confirmed',
            'profilePicture' => 'required|image',
            'gender' => 'required|in:Female,Male',
            'dateOfBirth' => 'required|date_format:Y-m-d|before:10 years ago',
            'address' => 'required|min:10'
        ],[
                'before' => 'You must be at least 10 years old',
                'date_format' => 'The date of birth does not match the format yyyy-MM-dd.'
            ]
        );

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'dateOfBirth' => $data['dateOfBirth'],
            'address' => $data['address'],
            'role' => "User"
        ]);

        $profilePictureName = $data['profilePicture']->getClientOriginalName();
        $data['profilePicture']->move(base_path().'/public/ProfileImages/',$profilePictureName);

        $user -> profilePicture = $profilePictureName;
        $user -> save();
        return $user;
    }
}
