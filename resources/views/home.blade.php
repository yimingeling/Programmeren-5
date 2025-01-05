<x-layout>


    <!-- Title Section -->
    <h1 class="text-3xl font-bold text-center text-black mb-4">Welcome Home!</h1>

    <div class="outline flex flex-col justify-center mx-auto p-6 rounded w-[300px]">
        <h2 class="text-lg font-semibold text-center mb-8">

            These users are on fire!:
        </h2>
        <!-- Top Users Section -->
        <div class="flex flex-col justify-center ">
            @if(count($topUsers) > 0)
                <h2 class="text-l text-black mb-4">Top users:</h2>
                <ul class="">
                    @foreach($topUsers as $user)
                        <section class="self-center w-36 bg-yellow-300 text-black p-3 text-center rounded shadow-md">
                            {{ $user->name }}

                        </section>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 text-center mt-4">No top users found.</p>
            @endif
        </div>
    </div>

    <!-- Confetti Button Section -->
    @if(auth()->check() && auth()->id() === $user->id)
        <x-confetti>

        </x-confetti>
    @endif

</x-layout>

