@props(['games' => $games, 'categories' => $categories])


<x-layout>


    <x-searchbar :categories="$categories">

    </x-searchbar>

    <br>

    @foreach($games as $index => $game)
        <h1>        {{$game->name}}         </h1>
        <img src="{{ Storage::url($game->image) }}" alt="{{ $game->image }}">
        <br>
        {{$game->year}} <br>
        {{$game->studio}} <br>
        {{$game->user}} <br>
        {{$game->licence->licenced_to}} <br>

        <p>Categories:</p>
        @forelse($game->categories as $category)
            <li>{{ $category->name }}</li>
        @empty
            <li>No categories assigned to this game.</li>
        @endforelse
        <a href="{{route('games.show',$game)}}">details</a>
        <br>

    @endforeach

</x-layout>
