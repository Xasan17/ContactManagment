<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this -> resource->id,
            'userId'=> $this->resource->user_id,
            'firstName'=>$this->resource->first_name,
            'lastName'=>$this->resource->last_name,
            'email'=>$this->resource->email,
            'address'=>$this->resource->address
        ];
    }
}
