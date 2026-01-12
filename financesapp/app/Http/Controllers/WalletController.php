<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //GET metoda
    {
        return WalletResource::collection(Wallet::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'   =>'required|integer|exists:users,id',
            'name'      =>'required|string|max:255',
            'type'      =>'required|in:bank,cash,savings,crypto,other',
            'currency'  =>'required|string|size:3',
            'initial_state' =>'nullable|numeric|min:0',
            'current_state' =>'nullable|numeric|min:0',
            'active'    =>'nullable|boolean',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation did not go through.',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data = $validator->validated();
        $wallet = Wallet::create($data);
        return response()->json(new Wallet($wallet), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new WalletResource(Wallet::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $wallet = Wallet::find($id);
        if(!$wallet){
            return response()->json(['message' => 'Wallet could not be found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id'   =>'sometimes|integer|exists:users,id',
            'name'      =>'sometimes|string|max:255',
            'type'      =>'sometimes|in:bank,cash,savings,crypto,other',
            'currency'  =>'sometimes|string|size:3',
            'initial_state' =>'nullable|numeric|min:0',
            'current_state' =>'nullable|numeric|min:0',
            'active'    =>'nullable|boolean',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation did not go through.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        $wallet->update($data);
        return response()->json(new Wallet($wallet), 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wallet = Wallet::find($id);

        if(!$wallet){
            return response()->json(['message' => 'Wallet could not be found.'], 404);
        }
        $wallet->delete();
        return response()->json(['message' => 'Wallet is deleted.'], 200);
    }
}
