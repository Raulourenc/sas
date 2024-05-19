<?php

namespace App\Http\Controllers;

use App\Models\StoreRegistry;
use App\Http\Requests\StoreStoreRegistryRequest;
use App\Http\Requests\UpdateStoreRegistryRequest;

class StoreRegistryController extends Controller
{
    public function index()
    {
        return response()->json(StoreRegistry::all());
    }

    public function store(StoreStoreRegistryRequest $request)
    {  
        $StoreRegistry = StoreRegistry::create($request->validated());

        if ($StoreRegistry->fails()) {
            return response()->json(['error' => $StoreRegistry->errors()], 400);
        }

        return response()->json($StoreRegistry, 201);
    }

    public function update(UpdateStoreRegistryRequest $request, StoreRegistry $id)
    {
        $StoreRegistry = StoreRegistry::find($id);
        if (is_null($StoreRegistry)) {
            return response()->json(['message' => 'StoreRegistry Not Found'], 404);
        }
        $StoreRegistry->update($request->validated());
        return response()->json($StoreRegistry, 200);
    }

    public function destroy($id)
    {
        $StoreRegistry = StoreRegistry::find($id);
        if (is_null($StoreRegistry)) {
            return response()->json(['message' => 'StoreRegistry Not Found'], 404);
        }
  
        $StoreRegistry->delete();
        return response()->json(null, 204);
    }
}
