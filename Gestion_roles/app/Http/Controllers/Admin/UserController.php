<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    
    public function index()
    {
        if(Gate::denies('index'))
        {
            abort(403);
        }
        return view('Admin.users.index',[
            "users" => User::with('roles')->get()
        ]);
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show(User $user)
    {
        
    }

   
    public function edit(User $user)
    {
        if(Gate::denies('edit-user'))
        {
            abort(403);
        }
        $user->load('roles');
        return view('Admin.users.edit',[
            "user" => $user,
            "roles" => Roles::all()
        ]);
    }

   
    public function update(Request $request, User $user)
    {
        if(Gate::denies('update-user'))
        {
            abort(403);
        }
        
        $data = $request->validate([

            'name' => ['required','string'],
            'email' => ['required','email'],
            'roles' => ['array','exists:roles,id']
            
        ]);

        $user->update($data);
        $user->roles()->sync($data['roles']);
        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {
        if(Gate::denies('delete-user'))
        {
            return redirect()->route('admin.users.index');
        }
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');

    }
}
