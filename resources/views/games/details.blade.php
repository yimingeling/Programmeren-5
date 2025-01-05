<x-layout>

    {{$game->name}}


    <p>Categories:</p>
    <ul>
        @forelse($game->categories as $category)
            <li>{{ $category->name }}</li>
        @empty
            <li>No categories assigned to this game.</li>
        @endforelse


        @if(auth()->check() && auth()->id() === $game->user_id)
            <a href="{{ route('games.edit', $game->id) }}" class="">Edit Game</a>

            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="" onclick="return confirm('Are you sure you want to delete this game?');">
                    Delete Album
                </button>
            </form>
    @endif


</x-layout>
