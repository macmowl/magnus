<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showAll() {
        $users = User::all();
        return view('backend.users.showall', compact('users'));
    }

    public function addUser() {
        return view('backend.users.new');
    }

    public function storeUser(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
        ]);

        $data = new User();
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function editUser($id) {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id) {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users'
        ]);

        $data = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function deleteUser($id) {
        User::find($id)->delete();
        $notification = array(
            'message' => 'User successfully deleted',
            'alert-type' => 'success',
        );

        return redirect()->route('user.view')->with($notification);
    }
}
