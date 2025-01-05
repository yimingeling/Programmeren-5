<x-layout>
    <!-- Loop through each game -->


    @foreach($games as $index => $game)
        <div class="flex justify-between content-center max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 mb-6">
            <!-- Game Name -->
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $game->name }}</h3>

            <!-- Game Details (Licence) -->
            <div class="text-gray-600 mb-4">
                <p class="text-lg">Licence: <span class="font-semibold">{{ $game->licence->licenced_to }}</span></p>
            </div>

            <!-- Link to Details -->
            <a href="{{ route('games.show', $game) }}"
               class="text-blue-500 hover:text-blue-700 transition-colors duration-200">View Details</a>
            <br>

            <!-- Form to toggle active status -->
            <form action="{{ route('games.toggleActive', $game) }}" method="POST" class="mt-4">
                @csrf
                <!-- Hidden input to determine the action (toggle active status) -->
                <input type="hidden" name="active" value="{{ $game->active ? 0 : 1 }}">

                <!-- Active Checkbox -->
                <label for="active" class="flex items-center space-x-2 text-gray-700">
                    <input type="checkbox" id="active" name="active" value="1"
                           class="form-checkbox" {{ $game->active ? 'checked' : '' }}
                           onchange="this.form.submit()"> <!-- Auto-submit when toggled -->
                    <span class="text-lg">Make this game active</span>
                </label>
            </form>
        </div>
    @endforeach
</x-layout>
