<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($request);
        // return parent::toArray($request);
        return [
                    "id"=>$this->id ,
                    "content"=>$this->content,
                    "created_at"=>$this->created_at,
                    'user_info'=>new UserResource($this->user)
                    // "commentable_id": 1,
                    // "commentable_type": "App\\Post"
        ];
        // return ['data' => $this->collection];
    }
}
