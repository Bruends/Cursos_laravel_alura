<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark my-2">adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}

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

    @isset($mensagemSucesso)
        <div class="alert alert-success my-2">
            {{ $mensagemSucesso }}
        </div>
    @endisset

</x-layout>
