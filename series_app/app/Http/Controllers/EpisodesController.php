<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $seasons)
    {

        $mensagemSucesso = session('mensagem.sucesso');
        return view('episodes.index', [
            'episodes' => $seasons->episodes,
            'mensagemSucesso' => $mensagemSucesso
        ]);
    }

    public function update(Request $request, Season $seasons)
    {
        $watchedEps = $request->episodes;
        $seasons->episodes->each(function (Episode $episode) use ($watchedEps) {
            $episode->watched = in_array($episode->id, $watchedEps);
        });

        $seasons->push();
        return to_route('episodes.index', $seasons->id)
            ->with('mensagem.sucesso', 'episódios modificados com sucesso!');
    }
}
