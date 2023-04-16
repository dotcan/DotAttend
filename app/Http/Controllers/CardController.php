<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::with('user')->simplePaginate(8);
        return view('admin.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cards.create');
    }

    public function show(Card $card)
    {
        $card->loadMissing('user');
        return [
            "Card" => $card->only(['rfid_tag', 'user_id']),
            "User" => $card->user ? $card->user->only('id', 'name', 'type') : null
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $card = Card::create($request->validate([
            'rfid_tag' => ['string', 'required', 'unique:' . Card::class],
            'user_id' => ['nullable', 'numeric', 'exists:' . User::class . ',id'],
        ]));
        return $request->expectsJson() ? $card : redirect()->route('admin.cards.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('admin.cards.index');
    }
}
