<?php
namespace App\Http\Resources\Api\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageReplyResource extends JsonResource
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
            'name'=>$this->name,
            'email'=>$this->email,
            'message'=>$this->message,
            'reply'=>$this->reply,
        ];
    }
}
