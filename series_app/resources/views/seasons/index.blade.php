<x-layout title="Temporadas">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada: {{$season->number}} <br>
                <span class="badge bg-primary">
                    {{sizeOf($season->episodes)}}
                </span>
            </li>
        @endforeach
    </ul>

</x-layout>
