<x-layout title="Séries">
    <a href="series/new" class="btn btn-dark my-2">adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>
</x-layout>
