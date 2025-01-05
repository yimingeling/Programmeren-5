@props(['games' => $games, 'categories' => $categories])


{{--<x-layout>--}}


{{--    <x-searchbar :categories="$categories">--}}

{{--    </x-searchbar>--}}

{{--    <br>--}}

{{--    @foreach($games as $index => $game)--}}
{{--        <h1>        {{$game->name}}         </h1>--}}
{{--        <img src="{{ Storage::url($game->image) }}" alt="{{ $game->image }}">--}}
{{--        <br>--}}
{{--        {{$game->year}} <br>--}}
{{--        {{$game->studio}} <br>--}}
{{--        {{$game->user}} <br>--}}
{{--        {{$game->licence->licenced_to}} <br>--}}

{{--        <p>Categories:</p>--}}
{{--        @forelse($game->categories as $category)--}}
{{--            <li>{{ $category->name }}</li>--}}
{{--        @empty--}}
{{--            <li>No categories assigned to this game.</li>--}}
{{--        @endforelse--}}
{{--        <a href="{{route('games.show',$game)}}">details</a>--}}
{{--        <br>--}}

{{--    @endforeach--}}

{{--</x-layout>--}}

<x-layout>
    <div>
        <div class="flex justify-between">
            <div>
                <!-- Search Bar Section -->
                <x-searchbar :categories="$categories" class="mb-6"/>
            </div>
            @if(auth()->check())
                <a href="{{ route('games.create') }}"
                   class="bg-blue-500 h-9 text-white px-2 py-1 rounded-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Create Game
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($games as $index => $game)
                <div
                    class="bg-white rounded-lg shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <!-- Game Title -->
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">{{ $game->name }}</h2>

                    <!-- Game Image -->
                    <div class="relative w-full h-60 mb-4">
                        <img src="{{ Storage::url($game->image) }}" alt="{{ $game->name }}"
                             class="object-cover w-full h-full rounded-lg">
                    </div>

                    <!-- Game Info -->
                    <div class="text-sm text-gray-700">
                        <p>Year: {{ $game->year }}</p>
                        <p>Studio: {{ $game->studio }}</p>
                        <p>Licenced by: {{ $game->licence->licenced_to }}</p>
                        <p>Uploaded by: {{$game->user->name}} </p>
                        <br>
                        <p class="font-semibold text-black">Categories:</p>
                        <ul class="list-disc pl-5 text-black">
                            @forelse($game->categories as $category)
                                <li>{{ $category->name }}</li>
                            @empty
                                <li>No categories assigned to this game.</li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="mt-4 flex justify-between">
                        @if(auth()->check() && auth()->id() === $game->user_id)
                            <div class="flex gap-2 ">
                                <!-- Edit Button -->
                                <a href="{{ route('games.edit', $game->id) }}"
                                   class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Edit Game
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST"
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
                                            onclick="return confirm('Are you sure you want to delete this game?');">
                                        Delete Game
                                    </button>
                                </form>
                            </div>
                        @endif

                        <!-- Details Button -->

                        <a href="{{ route('games.show', $game) }}"
                           class="bg-white text-black px-2 py-1 rounded-md hover:underline transition duration-300 focus:outline-none focus:ring-2 focus:ring-black"
                        >
                            View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
