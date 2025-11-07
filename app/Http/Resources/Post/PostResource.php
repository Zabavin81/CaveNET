<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'likes' => $this->likes,
            'is_published' => $this->is_published,
            'published_at' => $this->published_at,
            'profile_id' => $this->profile_id,
            'category' => $this->category->title,
            'author' => $this->profile->username,
            //new
            'images' => ImageResource::collection($this->whenLoaded('images')),
        ];
    }

}
