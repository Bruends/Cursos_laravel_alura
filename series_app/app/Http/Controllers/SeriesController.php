<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository){}

    public function index(Request $request)
    {
        $series = Series::all();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {

        $serie = $this->repository->add($request->all());

        return to_route('series.index')
            ->with('mensagem.sucesso', "serie {$serie->nome} adicionada com sucesso");

    }

    public function edit(Series $series)
    {
        return view('series.edit')
            ->with("serie", $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {

        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', 'Editado com sucesso');
    }

    public function destroy(Request $request)
    {
        Series::destroy($request->series);

        return to_route('series.index')
            ->with('mensagem.sucesso', 'serie removida com sucesso!');
    }
}
