<x-layout title="nova serie">
    <form action="/series/save" method="POST" class="container my-4">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome" />
        </div>
        <button class="btn btn-info text-white my-2">Salvar</button>
    </form>
</x-layout>
