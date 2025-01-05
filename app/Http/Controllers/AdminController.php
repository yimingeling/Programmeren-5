<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(game $games)
    {

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        if (auth()->user()->role != 1) {
            return view('home');

        }

        $games = Game::query();
        $games = $games->with('licence')->get();

        return view('admin.index', compact('games'));
    }
}
