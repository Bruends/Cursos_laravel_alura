<x-layout title="nova serie">
    <form action="{{route('series.store')}}" method="POST" class="container my-4">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="nome">Nome</label>
                <input
                    class="form-control"
                    type="text"
                    name="nome"
                    id="nome"
                    :value="old('nome')"
                    autofocus
                />
            </div>

            <div class="col-2">
                <label class="form-label" for="seasonsQty">Temporadas</label>
                <input
                    class="form-control"
                    type="text"
                    name="seasonsQty"
                    id="seasonsQty"
                    :value="old('seasonsQty')"
                />
            </div>

            <div class="col-2">
                <label class="form-label" for="espisodesPerSeason">Episodios</label>
                <input
                    class="form-control"
                    type="text"
                    name="espisodesPerSeason"
                    id="espisodesPerSeason"
                    :value="old('espisodesPerSeason')"
                />
            </div>
        </div>
        <button class="btn btn-info text-white my-2">Salvar</button>
    </form>
</x-layout>
