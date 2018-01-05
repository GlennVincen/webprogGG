<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function showUpdateMenu(){
        $users = User::where('role', 'Member')->orderBy('email')->get();
        return view('user.updateUserMenu')->with('users', $users);
    }

    public function getUserId(Request $request){
        $selectId = $request['id'];
        return redirect('/updateUser/'.$selectId);
    }

    public function showUpdateForm($userId){
        $user = User::where('id', $userId)->first();
        return view('user.updateUserForm')->with('user', $user);
    }

    public function update($userId, Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.$userId,
            'profilePicture' => 'required|image',
            'gender' => 'required|in:Female,Male',
            'dateOfBirth' => 'required|date_format:Y-m-d|before:11 years ago',
            'address' => 'required|min:10',
        ],[
                'before' => 'You must be older than 10 years old',
                'date_format' => 'The date of birth does not match the format yyyy-MM-dd.',
            ]
        );

        User::where('id', $userId)->update([
            'email' => $request['email'],
            'gender' => $request['gender'],
            'dateOfBirth' => $request['dateOfBirth'],
            'address' => $request['address']
        ]);

        $user = User::where('id', $userId)->first();

        $profilePictureName = time().'.'.$request['profilePicture']->getClientOriginalExtension();
        $request['profilePicture']->move(base_path().'/public/ProfileImages/',$profilePictureName);

        $user -> profilePicture = $profilePictureName;
        $user -> save();

        return redirect('/updateUser');
    }

    public function showDeleteMenu(){
        $users = User::where('role', 'User')->orderBy('email')->get();
        return view('user.deleteUserMenu')->with('users', $users);
    }

    public function delete(Request $request){
        User::where('id', $request['id'])->delete();
        return redirect('/deleteUser');
    }
}
