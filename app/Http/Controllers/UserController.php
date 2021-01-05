<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('admin.users.user-profile', ['user' => $user]);
    }

    // update the user data
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

        // adding flash message
        session()->flash('message', 'User Has Been Updated');

        return back();
    }
}
