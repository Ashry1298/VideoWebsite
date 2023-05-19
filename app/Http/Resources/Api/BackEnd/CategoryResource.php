<?php

namespace App\Http\Resources\APi\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
        ];
    }
}
