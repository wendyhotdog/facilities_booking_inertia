<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return inertia('Admin/User/Index', [
            'users' => User::with('roles')->latest()->get(),
        ]);
    }

    public function create()
    {
        return inertia('Admin/User/Create');
    }

    public function show($id)
    {
        return inertia('Admin/User/Show', [
            'user' => User::with('roles')->find($id),
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $user->assignRole($request->roles);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->route('admin.users.show', $user->id);
    }
}
