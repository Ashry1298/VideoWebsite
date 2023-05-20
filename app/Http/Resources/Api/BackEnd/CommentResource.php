<?php

namespace App\Http\Resources\Api\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user_id' => $this->user_id,
            'video_id' => $this->video_id,
            'comment' => $this->comment,
            'date'=>$this->created_at,
        ];
    }
}
