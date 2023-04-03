<?php

namespace App\Http\Controllers;

use App\Http\Requests\BikeRequest;
use App\Http\Resources\BikeResource;
use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bikes index')->only('index');
        $this->middleware('permission:bikes show')->only('show');
        $this->middleware('permission:bikes store')->only('store');
        $this->middleware('permission:bikes uptade')->only('update');
        $this->middleware('permission:bikes destroy')->only('destroy');
    }
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
