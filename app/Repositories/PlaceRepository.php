<?php

namespace App\Repositories;

use App\Models\Place;

class PlaceRepository
{
    public function createPlace($placeName, $latitude, $longitude)
    {
        return Place::create([
            'place_name' => $placeName,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    public function getPlaces()
    {
        return Place::all();
    }
}
