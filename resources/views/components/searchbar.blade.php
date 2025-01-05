@props(['categories' => $categories])

<form action="{{ route('search') }}" method="GET">

    <!-- Search Input -->
    <input type="text" name="query" placeholder="Search games..."
           value="{{ request('query') }}"
           class="px-4 py-2 w-full md:w-64 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

    <!-- Category Filter -->
    <select name="category" id="category"
            class="px-4 py-2 w-full md:w-48 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option
                value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>

    <!-- Search Button -->
    <button type="submit"
            class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Search
    </button>
</form>

<!-- Reset Filters Link -->
<a href="{{ route('games.index') }}" class="mb-8 text-sm text-blue-500 hover:underline mt-2 block">
    Reset filters
</a>
