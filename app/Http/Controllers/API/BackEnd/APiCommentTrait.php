<?php

namespace App\Http\Controllers\API\BackEnd;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Http\Requests\BackEnd\Comments\Update;
use App\Http\Requests\FrontEnd\Comments\StoreValidation;
use App\Http\Resources\Api\BackEnd\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait APiCommentTrait
{

    public function commentStore(Store $request)
    {   $row=$request->validated();
        $row['user_id']=auth()->user()->id;
        $data = Comment::create($row);
        $data=new CommentResource($data);
        return response()->json($this->handleCrudResponse($data, 'New Comment Added Successfully'));
    }

    public function deleteComment($id)
    {
        Comment::findorfail($id)->delete();
        $message='Comment Deleted Successfully';
        return response()->json($this->handleCrudResponse($message, 'Success'));
    }


    public function updateComment($id, Update $request)
    {
        $comment = Comment::findorfail($id);
        $comment->update($request->validated());
        $data=new CommentResource($comment);
        return response()->json($this->handleCrudResponse($data, 'Comment Update Successfully'));
    }
}
