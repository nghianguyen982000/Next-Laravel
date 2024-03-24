<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'message' => $this->resource->content,
            'messageType' => $this->getAuthor($this->resource->user_id)
        ];
    }

    private function getAuthor($user_id)
    {
        return $user_id === auth()->id() ? 0 : 1;
    }
}
