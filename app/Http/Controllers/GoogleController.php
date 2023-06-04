<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PlaceRepository;
use App\Requests\GooglePlaceRequest;


class GoogleController extends Controller
{


    protected $placeRepository;

    public function __construct(PlaceRepository $placeRepository)
    {
        $this->placeRepository = $placeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places =  $this->placeRepository->getPlaces();
        return view("places.show",compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("places.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GooglePlaceRequest $request)
    {
        try {
            $placeName = $request->input('autocomplete');
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            $place = $this->placeRepository->createPlace($placeName, $latitude, $longitude);
            return redirect()->back()->with('success', 'Place saved');  
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the all resources.
     */
    public function show()
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
