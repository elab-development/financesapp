<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'    =>$this->id,
            'user_id'   =>$this->user_id,
            'user'  =>$this->user,
            'wallet_id' =>$this->wallet_id,
            'wallet'    =>$this->wallet,
            'category_id'   =>$this->category_id,
            'category'  =>$this->category,
            'type'  =>$this->type,
            'amount'    =>(float) $this->amount,
            'date'  =>$this->date ? $this->date->format('Y-m-d'):null,
            'description'   =>$this->description,
        ];
    }
}
