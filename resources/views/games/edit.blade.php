<x-layout>

    <form method="POST" enctype="multipart/form-data" action={{ route('games.store') }} >
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label for="name" class="">name</label>
            <input value="{{ $game->name }}" type="text" id="name" name="name" class="" required>
        </div>
        <div>
            <label for="year" class="">year</label>
            <input value="{{ $game->year }}" type="text" id="year" name="year" class="" required>
        </div>
        <div>
            <label for="studio" class="">studio</label>
            <input value="{{ $game->studio }}" type="text" id="studio" name="studio" class="" required>
        </div>


        <div>
            <label for="category" class="">categories</label>
            <br>
            @foreach ($category as $index)
                <input type="checkbox" id="category" name="category">

                <option value="{{ $index->id }}">
                    {{ $index->name }}
                </option>
            @endforeach
        </div>

        <div>
            <label for="licence" class="">Licence</label>
            <select id="licence" name="licence" class="">
                @foreach ($licence as $index)
                    <option value="{{ $index->id }} {{ $index->id == $game->licence_id ? 'selected' : '' }}">
                        {{ $index->licenced_to }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="">Image</label>
            <input type="file" id="image" name="image" class="">
        </div>

        <div>
            <label for="active" class="">
                <input type="checkbox" id="active" name="active" value="1" {{ $game->active ? 'checked' : '' }}class=""
                       checked>
                Make this game active
            </label>
        </div>

        <h2>Categories:</h2>

        <?php


        ?>
            <!-- Submit Button -->
        <div>
            <button type="submit" class="">Opslaan</button>
        </div>
    </form>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger mt-6">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


</x-layout>
