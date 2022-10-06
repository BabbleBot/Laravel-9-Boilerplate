<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PageResource extends JsonResource
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
            'id' => $this->id,
            'state' => $this->state,
            'content' => $request->has('fullContent') ? $this->description : Str::words($this->content, 10),
            'book' => new BookResource($this->whenLoaded('book')),
            'origins' => PageResource::collection($this->whenLoaded('origins')),
            'destinations' => PageResource::collection($this->whenLoaded('destinations')),
        ];
    }
}
