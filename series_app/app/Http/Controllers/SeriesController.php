<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
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

        $serie = Series::create($request->all());

        $seasons = [];
        for($i = 1; $i <= $request->seasonsQty; $i++){
            $seasons[] = [
                "series_id" => $serie->id,
                "number" => $i
            ];
        }

        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->season as $season) {
            for($j = 1; $j <= $request->espisodesPerSeason; $j++){
                $episodes[] = [
                    "season_id" => $season->id,
                    "number" => $j
                ];
            }
        }

        Episode::insert($episodes);


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
