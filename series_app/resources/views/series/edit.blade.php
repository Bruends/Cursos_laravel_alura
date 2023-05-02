<x-layout title="editar serie">
    <form action="{{route('series.update', $serie->id)}}" method="POST" class="container my-4">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome" value="{{$serie->nome}}" />
        </div>
        <button class="btn btn-info text-white my-2">Editar</button>
    </form>
</x-layout>
