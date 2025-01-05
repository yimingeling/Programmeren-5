<x-layout>
    <form method="POST" enctype="multipart/form-data" action="{{ route('games.update', $game->id) }}"
          class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-4">
            <label for="name" class="block text-lg font-semibold text-gray-700">Name</label>
            <input value="{{ $game->name }}" type="text" id="name" name="name"
                   class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <!-- Year -->
        <div class="mb-4">
            <label for="year" class="block text-lg font-semibold text-gray-700">Year</label>
            <input value="{{ $game->year }}" type="text" id="year" name="year"
                   class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <!-- Studio -->
        <div class="mb-4">
            <label for="studio" class="block text-lg font-semibold text-gray-700">Studio</label>
            <input value="{{ $game->studio }}" type="text" id="studio" name="studio"
                   class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <!-- Categories -->
        <div class="mb-4">
            <label for="category" class="block text-lg font-semibold text-gray-700">Categories</label>
            <div class="space-y-2 mt-2">
                @foreach ($category as $index)
                    <div class="flex items-center">
                        <input type="checkbox" id="category-{{ $index->id }}" name="categories[]"
                               value="{{ $index->id }}"
                               {{ in_array($index->id, $game->categories->pluck('id')->toArray()) ? 'checked' : '' }} class="mr-2">
                        <label for="category-{{ $index->id }}" class="text-gray-600">{{ $index->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Licence -->
        <div class="mb-4">
            <label for="licence" class="block text-lg font-semibold text-gray-700">Licence</label>
            <select id="licence" name="licence"
                    class="w-full p-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach ($licence as $index)
                    <option value="{{ $index->id }}" {{ $index->id == $game->licence_id ? 'selected' : '' }}>
                        {{ $index->licenced_to }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label for="image" class="block text-lg font-semibold text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="w-full p-2 mt-2 border border-gray-300 rounded-md">
        </div>

        <!-- Active -->
        <div class="mb-4">
            <label for="active" class="flex items-center space-x-2 text-gray-700">
                <input type="checkbox" id="active" name="active" value="1"
                       {{ $game->active ? 'checked' : '' }} class="form-checkbox">
                <span class="text-lg font-semibold">Make this game active</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                    class="w-full py-2 mt-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Save
            </button>
        </div>
    </form>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger mt-6 max-w-4xl mx-auto">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-layout>
