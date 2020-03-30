<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"=>$this->id ,
            "name"=> $this->name,
            "email"=> $this->email,
            "provider"=> $this->provider ,
            "provider_id"=> $this->provider_id ,
            "token"=> $this->token 
        ];

    }
}
