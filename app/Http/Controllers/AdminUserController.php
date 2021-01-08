<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','ASC')->get();
        $data = [
            'users' => $users
        ];
        return view('admin.userlists.index',$data);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = ['user' => $user];

        return view('admin.userlists.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('admin.userlists.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.userlists.index');
    }
}
