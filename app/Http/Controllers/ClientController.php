<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return ClientResource::collection($clients);
    }


    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        $client = Client::create($data);
        return ClientResource::make($client);
    }
    public function show($id)
    {
        $client = Client::find($id);
        return ClientResource::make($client);
    }

    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->validated();
        $client->update($data);
        return ClientResource::make($client);
    }
    public function destroy(Client $client)
    {
        $client->delete(); //Client::destroy($client);
        return response()->json([], 200);
    }

}
