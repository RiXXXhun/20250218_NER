<?php

namespace App\Http\Controllers;

use App\Models\Harbor;
use Illuminate\Http\Request;

class HarborController extends Controller
{
    public function getHarbor(){
        $harbors = Harbor::query()
        ->with('ships')
        ->get();

        return response()->json($harbors);
    }
    public function createHarbor(Request $req){
        $data = $req->all();
        $harbor = Harbor::create($data);
        return response()->json($harbor, 201);
    }
    public function updateHarbor(Harbor $harbor, Request $req){
        $data = $req->all();
        $harbor->update($data);
        return response()->json($harbor);
    }
    public function deleteHarbor(Harbor $harbor){
        $harbor->delete();
        return response()->json(null, 204);
    }
    public function openHarbor(Harbor $harbor) {
        $harbor->open = !$harbor->open;
        $harbor->save();

        return response()->json($harbor);
    }
}