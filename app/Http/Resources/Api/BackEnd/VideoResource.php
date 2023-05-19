<?php

namespace App\Http\Resources\Api\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'description' => $this->description,
            'youtube' => $this->youtube,
            'image' => $this->image,
            'published' => $this->published,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ];
    }
}
