<?php

namespace App\Http\Resources;
use App\Http\Resources\UserResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'describtion'=>$this->describtion,
            'img'=>$this->img,
            'comments'=>CommentResource::collection($this->comments),
            'user_info'=>new UserResource($this->user)
        ];
    }
}
