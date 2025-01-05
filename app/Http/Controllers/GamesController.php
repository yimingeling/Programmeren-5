<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Licence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class GamesController extends Controller
{

//    public function boot(): void
//    {
//        Gate::define('update-game', function (User $user, Game $game) {
//            return $user->id === $game->user_id;
//        });
//    }


    public function index(game $games)
    {
//        //
//        $licence = Licence::find($games->licence_id);
//        $games = Game::query();
//        $games = $games->with('licence')->get();


//        return view('games.index', compact('games', 'licence'));


        $query = '';
        // get all genres for the dropdown
        $categories = Category::all();
        // get all public albums from public users
        $games = Game::where('active', 1);


        // pass the albums to the view
        return view('games.index', compact('games', 'categories', 'query'));


    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Text search input
        $category = $request->input('category'); // Category dropdown input

        // Build the query
        $games = Game::query();

        if ($query) {
            $games->where('name', 'LIKE', "%{$query}%");
        }

        if ($category) {
            $games->whereHas('categories', function ($q) use ($category) {
                $q->where('categories.id', $category);
            });
        }

        // Fetch results
        $games = $games->paginate(10);

        // Get all categories for the dropdown
        $categories = Category::all();

        // Return the view with results
        return view('games.index', compact('games', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {
            $licence = Licence::all();
            $category = category::all();

            return view('games.create', compact('licence', 'category'));
        } else {
            return view('auth.login');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to store games!');
        }
        //
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'studio' => 'required',
            'active' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $game = new Game();
        $game->name = $request->input('name');
        $game->year = $request->input('year');
        $game->studio = $request->input('studio');

        if ($request->file('image')) {
            $request['image'] = $request->file('image')->store('images', 'public'); // Save in 'storage/images'
            $game->image = $request['image'];

        }

        if ($request->has('active')) {
            $game->active = 1;
        } else {
            $game->active = 0;
        }

        $game->licence_id = $request->input('licence');

        $game->user_id = auth()->id();

//        $game->category()->attach($category_id);


        $game->save();


    }

    /**
     * Display the specified resource.
     */
    public function show(game $game)
    {
        //

        $licence = Licence::find($game->licence_id);


        return view('games.details', compact('game', 'licence',));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //


        // checks if the user is logged in
        if (auth()->check()) {
            $game = Game::findOrFail($id);

            // Check if the logged-in user is the owner of the album
            if (auth()->id() === $game->user_id) {
                $licence = Licence::all();
                $category = category::all();

                // return the album information and genres to the display page
                return view('games.edit', compact('game', 'licence', 'category'));
            } else {
                // Redirect to albums index if the user is not the owner
                return redirect()->route('games.index')->with('error', 'You do not have permission to edit this game.');
            }
        } else {
            // Redirect to login if the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to edit this game.');
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Game $game)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'studio' => 'required|string|max:255',
            'active' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update the game's attributes
        $game->name = $request->input('name');
        $game->year = $request->input('year');
        $game->studio = $request->input('studio');
        $game->active = $request->input('active') ? 1 : 0;

        // Handle the image if uploaded
        if ($request->file('image')) {
            // Delete the old image if it exists
            if ($game->image) {
                Storage::delete(str_replace('/storage/', 'public/', $game->image));
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $game->image = $imagePath;
        }

        // Save changes
        $game->save();

        // Redirect back with a success message
        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // login check
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to delete an album.');
        }

        // Find the album or fail
        $game = Game::findOrFail($id);

//         Check if user is the owner of the album or an admin
        if (auth()->user()->id !== $game->user_id && auth()->user()->role !== 1) {
            return redirect()->route('games.index')->with('error', 'You do not have permission to delete this album.');
        }

        // Delete the album
        $game->delete();

        // Redirect after deletion
        return redirect()->route('games.index')->with('success', 'Album deleted successfully!');
    }
}
