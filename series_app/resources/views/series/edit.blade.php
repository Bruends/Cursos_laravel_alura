<x-layout title="nova serie">
    <x-form
        :action="route('series.update', $serie->id)"
        :update="true"
        :nome="$serie->nome"
    />
</x-layout>
