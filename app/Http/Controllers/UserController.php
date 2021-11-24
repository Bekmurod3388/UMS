<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $data = $request->validate([
           'name'=>'required',
           'surname'=>'required',
           'email' => 'required',
           'password' => 'required|min:6|confirmed'
        ]);

        $data['password'] = Hash::make($data['password']);
        User::query()->create($data);
        return redirect()->back()->with('success', 'Muvaffaqiyatli yaratildi');
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'surname' => 'required',
            'password' => 'confirmed'
        ]);

        if (!isset($data['password']))
            unset($data['password']);
        else
            $data['password'] = Hash::make($data['password']);

        $user->update($data);
        return redirect()->route('admin.users.index')
            ->with('success', 'Muvaffaqiyatli yangilandi');
    }


    public function destroy(User $user) {
        if ($user->id > 1)
            $user->delete();

        return redirect()->route('admin.users.index');
    }
}
