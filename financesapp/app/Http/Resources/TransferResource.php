<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
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
            'wallet_fromid' =>$this->wallet_fromid,
            'wallet_from' =>$this->wallet_from,
            'wallet_inid' =>$this->wallet_inid,
            'wallet_in' =>$this->wallet_in,
            'amount'    =>(float) $this->amount,
            'currency'  =>$this->currency,
            'comission' =>$this->comission !== null ? (float) $this->comission : null,
            'date'  =>$this->date ? $this->date->format('Y-m-d'):null,
            'description'   =>$this->description,
        ];
    }
}
