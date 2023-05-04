<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(array $data): Series
    {
        return DB::transaction(function () use ($data) {
            $serie = Series::create($data);

            $seasons = [];
            for($i = 1; $i <= $data['seasonsQty']; $i++){
                $seasons[] = [
                    "series_id" => $serie->id,
                    "number" => $i
                ];
            }

            Season::insert($seasons);

            $episodes = [];
            foreach ($serie->season as $season) {
                for($j = 1; $j <= $data['espisodesPerSeason']; $j++){
                    $episodes[] = [
                        "season_id" => $season->id,
                        "number" => $j
                    ];
                }
            }

            Episode::insert($episodes);

            return $serie;
        });

    }
}
