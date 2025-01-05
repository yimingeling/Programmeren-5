<?php


namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Get all users
        $users = User::all();

        // Initialize the array to store top users
        $topUsers = [];

        // Loop through users and find those with 5 or more games
        foreach ($users as $user) {
            $gameCount = Game::where('user_id', $user->id)->count();

            // Add user to the topUsers array if they have 5 or more games
            if ($gameCount >= 5) {
                $topUsers[] = $user; // Accumulate the users
            }
        }

        // Return the view with top users
        return view('home', compact('topUsers'));
    }
}
