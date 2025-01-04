<x-layout>

    <form method="POST" enctype="multipart/form-data" action={{ route('games.store') }} >
        @csrf

        <!-- Title -->
        <div>
            <label for="name" class="">name</label>
            <input type="text" id="name" name="name" class="" required>
        </div>
        <div>
            <label for="year" class="">year</label>
            <input type="text" id="year" name="year" class="" required>
        </div>
        <div>
            <label for="studio" class="">studio</label>
            <input type="text" id="studio" name="studio" class="" required>
        </div>


        <div>
            <label for="licence" class="">Genre</label>
            <select id="licence" name="licence" class="">
                @foreach ($licence as $index)
                    <option value="{{ $index->id }}">{{ $index->licenced_to }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="">Image</label>
            <input type="file" id="image" name="image" class="">
        </div>

        <div>
            <label for="active" class="">
                <input type="checkbox" id="active" name="active" value="1" class="" checked>
                Make this album active
            </label>
        </div>

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
