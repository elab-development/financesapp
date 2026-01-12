<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
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
            'name'  =>$this->name,
            'type'  =>$this->type,
            'currency'  =>$this->currency,
            'initial_state' =>(float) $this->initial_state,
            'current_state' =>(float) $this->current_state,
            'active'    =>(boolean) $this->active
        ];
    }
}
