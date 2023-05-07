<x-layout title="Temporadas">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{route('episodes.index', $season->id)}}">
                    Temporada: {{$season->number}} <br>
                </a>
                <span class="badge bg-primary">
                    {{ $season->watchedEps()}} / {{ sizeOf($season->episodes) }}
                </span>
            </li>
        @endforeach
    </ul>

</x-layout>
