<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BookResource extends JsonResource
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
            'name' => $this->name,
            'cover' => $this->cover,
            'description' => $request->has('fullDescription') ? $this->description : Str::words($this->description, 10),
            'author' => new UserResource($this->whenLoaded('user')),
            'pages' => PageResource::collection($this->whenLoaded('pages')),
        ];
    }
}
