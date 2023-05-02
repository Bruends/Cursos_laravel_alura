<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::all();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        return to_route('series.index')
            ->with('mensagem.sucesso', "serie {$serie->nome} adicionada com sucesso");

    }

    public function edit(Serie $series)
    {
        return view('series.edit')
            ->with("serie", $series);
    }

    public function update(Serie $series, Request $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', 'Editado com sucesso');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->series);

        return to_route('series.index')
            ->with('mensagem.sucesso', 'serie removida com sucesso!');
    }


}
