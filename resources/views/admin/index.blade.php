<x-layout>


    @foreach($games as $index => $game)
        <h3>        {{$game->name}}         </h3>


        {{$game->user}} <br>
        {{$game->licence->licenced_to}} <br>


        <a href="{{route('games.show',$game)}}">details</a>
        <br>


        <div>
            <label for="active" class="">
                <input type="checkbox" id="active" name="active" value="1" class="" checked>
                Make this album active
            </label>
        </div>

    @endforeach
</x-layout>
