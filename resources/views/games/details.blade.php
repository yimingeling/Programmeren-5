<x-layout>
    <!-- Game Name -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h1 class="text-3xl font-bold text-gray-800">{{ $game->name }}</h1>
    </div>

    <!-- Categories -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <p class="text-xl font-semibold text-gray-700">Categories:</p>
        <ul class="list-disc pl-5 text-gray-600">
            @forelse($game->categories as $category)
                <li>{{ $category->name }}</li>
            @empty
                <li>No categories assigned to this game.</li>
            @endforelse
        </ul>
    </div>

    <!-- Actions (Edit and Delete) -->
    @if(auth()->check() && auth()->id() === $game->user_id)
        <div class="flex space-x-4">
            <!-- Edit Button -->
            <a href="{{ route('games.edit', $game->id) }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Edit Game
            </a>

            <!-- Delete Button -->
            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
                        onclick="return confirm('Are you sure you want to delete this game?');">
                    Delete Game
                </button>
            </form>
        </div>
    @endif
</x-layout>
