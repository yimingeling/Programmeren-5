<x-layout>

    <div class="container mx-auto p-6">
        <!-- Title Section -->
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-4">Welcome Home!</h1>
        <p class="text-lg text-center text-gray-600 mb-8">
            These users are on fire!:
        </p>

        <!-- Top Users Section -->
        @if(count($topUsers) > 0)
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Top Users</h2>
            <ul class="space-y-2">
                @foreach($topUsers as $user)
                    <li class="bg-blue-100 text-blue-800 p-4 rounded shadow-md">
                        {{ $user->name }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 text-center mt-4">No top users found.</p>
        @endif

        <!-- Confetti Button Section -->
        @if(auth()->check() && auth()->id() === $user->id)
            <x-confetti>

            </x-confetti>
        @endif
    </div>

</x-layout>

