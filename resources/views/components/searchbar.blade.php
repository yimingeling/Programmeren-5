@props(['categories' => $categories])

<form action="{{ route('search') }}" method="GET"
      class="">

    <!-- Search Input -->
    <input type="text" name="query" placeholder="Search games..." value="{{ request('query') }}"
           class="">

    <!-- Genre Filter -->
    <select name="category" id="category"
            class="">
        <option value="">All Categories</option>
        @foreach ($categories as $i)
            <option value="{{ $i->id }}" {{ request('category') == $i->id ? 'selected' : '' }}>{{ $i->name }}</option>
        @endforeach
    </select>


    <!-- Search Button -->
    <button type="submit" class="">
        Search
    </button>
</form>

<!-- Reset Filters Link -->
<a href="{{ route('games.index') }}" class="">Reset filters</a>
