@props(['games' => $games, 'categories' => $categories])


<x-layout>


    <x-searchbar :categories="$categories">

    </x-searchbar>

    @foreach($games as $index => $game)
        {{$game->name}}
        {{--        {{$game->licence->licenced_to}}--}}


        <a href="{{route('games.show',$game)}}">details</a>
        <br>

    @endforeach

</x-layout>
