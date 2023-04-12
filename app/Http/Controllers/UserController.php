<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('type', '!=', 'ADMIN')->simplePaginate(8);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'email', 'max:255', 'unique:' . User::class],
                'card_id' => ['nullable', 'exists:' . Card::class . ',id'],
                'type' => ['required', 'string']
            ]) + ['password' => Hash::make(fake()->password(21))]);

        if (!is_null($request->input('card_id')))
            Card::find($request->input('card_id'))->update(['user_id' => $user->id]);

        return $request->expectsJson() ? $user : redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $crd = $user->card->id ?? 0;
        $user->update($request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
                'card_id' => ['nullable', 'exists:' . Card::class . ',id'],
            ]));

        if (!is_null($request->input('card_id')) && $request->input('card_id') != $crd)
            Card::find($request->input('card_id'))->update(['user_id' => $user->id]);

        return $request->expectsJson() ? $user : redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
