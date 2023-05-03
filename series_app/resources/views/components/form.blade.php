<form action="{{ $action }}" method="POST" class="container my-4">
    @csrf

    @if($update)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label" for="nome">Nome</label>
        <input
            class="form-control"
            type="text"
            name="nome"
            id="nome"
            @isset($nome)
                value="{{$nome}}"
            @endisset
        />
    </div>
    <button class="btn btn-info text-white my-2">Salvar</button>
</form>
