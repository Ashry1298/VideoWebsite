<?php
namespace App\Http\Controllers\API\BackEnd;

use App\Models\Message;
use App\Mail\ReplyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\Api\BackEnd\MessageResource;
use App\Http\Requests\BackEnd\Messages\ReplyValidation;
use App\Http\Requests\BackEnd\Messages\StoreValidation;
use App\Http\Resources\Api\BackEnd\MessageReplyResource;

class MessageController extends BackEndController
{ 
   use HandleResponse;
   public function __construct(Message $model)
   {
      $this->model = $model;
   }

   public function reply(ReplyValidation $request,$id)
   {
      $message = Message::findorfail($id);
      $message['reply'] = $request->reply;
      $message=new MessageReplyResource($message);
      // Mail::to($message->email)->send(new ReplyContact($message));
      return response()->json($this->handleCrudResponse($message, 'Success'));

   }
   public function getRows()
   {
       $rows = $this->model::paginate(5);
       $rows = MessageResource::collection($rows);
       return $rows;
   }

   public function show($id)
   {
       $message = Message::findorfail($id);
       $message=new MessageResource($message);
       return response()->json($this->handleCrudResponse($message, 'Success'));
   }
}
