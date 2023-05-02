<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $title = 'series';
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        return view('series.index', compact('series', 'title'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');

        Serie::create($request->all());

        return to_route('series.index');

    }


}
