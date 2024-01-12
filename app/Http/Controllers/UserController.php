<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'admin')->get();
        $view_data = [
            'users' => $users,
        ];
        return view('user.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'admin'
        ]);

        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)
            ->first();
        $view_data = [
            'user' => $user
        ];
        return view('user.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $sameEmail = User::where('email', $email)->first();
        if ($sameEmail) {
            return redirect()->back()->with('error_message', 'Email sudah digunakan');
        }

        User::where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => 'admin'
            ]);
        Session::flash('success_update', 'Data berhasil diubah.');
        return redirect("user");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("user");
    }
}
