<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransferResource;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    public function index() 
    {
        return TransferResource::collection(Transfer::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'   =>'required|integer|exists:users,id',
            'wallet_inid'   =>'required|integer|exists:wallets,id|different:wallet_fromid',
            'wallet_fromid'   =>'required|integer|exists:wallets,id',
            'amount'    =>'required|numeric|min:0',
            'currency'  =>'required|string|size:3',
            'comission' =>'nullable|numeric|min:0',
            'date'  =>'required|date',
            'description'    =>'nullable|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation did not go through.',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data = $validator->validated();
        $transfer = Transfer::create($data);
        return response()->json(new TransferResource($transfer), 201);
    }

    public function destroy($id)
    {
        $transfer = Transfer::find($id);

        if(!$transfer){
            return response()->json(['message' => 'Transfer could not be found.'], 404);
        }
        $transfer->delete();
        return response()->json(['message' => 'Transfer is deleted.'], 200);
    }
}
