<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() 
    {
        return TransactionResource::collection(Transaction::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'   =>'required|integer|exists:users,id',
            'wallet_id'   =>'required|integer|exists:wallets,id',
            'category_id'   =>'required|integer|exists:categories,id',
            'name'      =>'required|string|max:255',
            'type'      =>'required|in:bank,cash,savings,crypto,other',
            'amount'    =>'required|numeric|min:0',
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
        $transaction = Transaction::create($data);
        return response()->json(new Transaction($transaction), 201);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if(!$transaction){
            return response()->json(['message' => 'Transaction could not be found.'], 404);
        }
        $transaction->delete();
        return response()->json(['message' => 'Transaction is deleted.'], 200);
    }
}
