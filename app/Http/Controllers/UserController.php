<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('profile.profile', ['user' => $user]);
    }

    public function edit($id)
    {
        if (Auth::id() != $id) {
            session()->flash('privilege','Không có quyền truy cập');
            return redirect('/');
        }
        $user = User::find($id);
        return view('profile.editProfile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->input('uid'));
        if ($request->input('fullname') != null) {
            $user->fullname = $request->input('fullname');
        }
        if ($request->input('address') != null) {
            $user->address = $request->input('address');
        }
        if ($request->input('fullname') != null) {
            $user->address = $request->input('address');
        }
        if ($request->input('name') != null) {
            $user->name = $request->input('name');
        }
        if ($request->input('birth') != null) {
            $user->birth = $request->input('birth');
        }
        if ($request->input('description') != null) {
            $user->description = $request->input('description');
        }
        if ($request->file('avatar')) {
            $url = $request->file('avatar')->store('public/image');
            $user->avatar =  str_replace('public/', '', $url);
        }
        $user->touch();
        $user->save();
        session()->flash('success','Cập nhật thông tin thành công');
        return redirect('/profile/' . $request->input('uid'));
    }
}
