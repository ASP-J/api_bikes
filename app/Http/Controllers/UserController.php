<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users index')->only('index');
        $this->middleware('permission:users show')->only('show');
        $this->middleware('permission:users store')->only('store');
        $this->middleware('permission:users uptade')->only('update');
        $this->middleware('permission:users destroy')->only('destroy');
    }

    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(['name', 'user', 'email','document','role'])
            ->paginate(10)
            ->appends(request()->query());
        return UserResource::collection($users);

    }


    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        $user->assignRole($data['role']);
        return UserResource::make($user);
    }
    public function show($id)
    {
        $user = User::find($id);
        return UserResource::make($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return UserResource::make($user);
    }
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([], 200);
    }
}
