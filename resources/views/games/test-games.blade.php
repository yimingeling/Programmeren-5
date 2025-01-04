<x-layout>


    @foreach($games as $index => $game)
        {{$game->name}}
        {{$game->licence->licenced_to}}

        <br>

    @endforeach


</x-layout>
