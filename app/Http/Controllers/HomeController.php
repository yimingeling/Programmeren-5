<?php


namespace App\http\Controllers;

use App\Models\Games;

class HomeController extends Controller
{
    public function index()
    {
        $game = new Games();
        $game->name = 'Tetris';
        return view(view: 'home');
    }
}
