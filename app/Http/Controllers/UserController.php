<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    // Get all users
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    // Display single user
    public function show(User $user)
    {
        return view('admin.users.user-profile', ['user' => $user]);
    }

    // update the user
    public function update(User $user)
    {
        // Form Validation
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'file'
        ]);

        if(request('photo')){
            $data['photo'] = request('photo')->store('uploads');
            $user->photo = $data['photo'];
        }

        $user->update($data);

        return back();
    }

    //destroy user
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('user-destroyed', 'User Has been deleted');

        return back();
    }
}
