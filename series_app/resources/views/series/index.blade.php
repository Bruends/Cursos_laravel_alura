<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    <a href="{{ route('series.create') }}" class="btn btn-dark my-2">adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
               <a href="{{ route('seasons.index', $serie->id) }}">
                {{ $serie->nome }}
               </a>
                <div class="d-flex">
                    <form action="{{route('series.destroy', $serie->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                    <div class="mx-2">
                        <a class="btn btn-warning btn-sm" href="{{route('series.edit', $serie->id)}}">E</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

</x-layout>
