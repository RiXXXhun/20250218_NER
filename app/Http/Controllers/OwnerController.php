<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function getall()
    {
        return Owner::query()
        ->with("ships")
            ->get();

        return response()->json($owners);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $owner = Owner::create($data);

        return response()->json($owner, 201);
    }

    public function update(Owner $owner, Request $request)
    {
        $data = $request->all();
        $owner->update($data);
        return response()->json($owner);
    }

    public function delete(Owner $owner){
        $owner->delete();
        return response()->json(null, 204);
    }

}
