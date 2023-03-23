<?php

namespace App\Http\Controllers;

use App\Http\Requests\BikeRequest;
use App\Http\Resources\BikeResource;
use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    public function index()
    {
        $bikes = Bike::all();
        return BikeResource::collection($bikes);
    }


    public function store(BikeRequest $request)
    {
        $data = $request->validated();
        $bike = Bike::create($data);
        return BikeResource::make($bike);
    }
    public function show($id)
    {
        $bike = Bike::find($id);
        return BikeResource::make($bike);
    }

    public function update(BikeRequest $request, Bike $bike)
    {
        $data = $request->validated();
        $bike->update($data);
        return BikeResource::make($bike);
    }
    public function destroy($id)
    {
        Bike::destroy($id);
        return response()->json([], 200);
    }
}
