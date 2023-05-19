<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Message;
use App\Mail\ReplyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Messages\ReplyValidation;
use App\Http\Requests\BackEnd\Messages\StoreValidation;

class MessageController extends BackEndController
{
   public function __construct(Message $model)
   {
      $this->model = $model;
   }


   public function reply(ReplyValidation $request)
   {
      // dd($request->all());
      $message = Message::findorfail($request->id);
      $message['reply'] = $request->reply;
      Mail::to($message->email)->send(new ReplyContact($message));

      return redirect()->back();
   }
}
