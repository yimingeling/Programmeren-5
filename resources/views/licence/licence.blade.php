<x-layout>

    @foreach($licences as $index => $licence)
        <a href="">
            {{$licence->licenced_to}}

        </a>
        <br>

    @endforeach


</x-layout>
