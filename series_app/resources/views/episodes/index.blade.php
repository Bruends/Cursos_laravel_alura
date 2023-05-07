<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <form method="POST">
    @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p>Episódio: {{$episode->number}} </p>
                    <input
                        type="checkbox"
                        class="form-controll"
                        name="episodes[]"
                        value="{{$episode->id}}"
                        @if($episode->watched) checked @endif
                    >
                </li>
            @endforeach
        </ul>
        <button class="my-2 btn btn-primary">Salvar</button>
    </form>
</x-layout>
