<x-layout>

    @foreach($licences as $index => $licence)
        {{$licence->licenced_to}}
        <br>

    @endforeach


</x-layout>
