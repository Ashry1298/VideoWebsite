<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Http\Requests\BackEnd\Comments\Update;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CommentTrait
{

    public function commentStore(Store $request)
    {
        $data = $request->validated();
        Comment::create($data + ['user_id' => Auth::user()->id]);
        return back();
    }


    public function deleteComment($id)
    {
        Comment::findorfail($id)->delete();
        return back();
    }


    public function updateComment($id, Update $request)
    {
        $comment = Comment::findorfail($id);
        $comment->update($request->validated());
        return redirect()->route('videos.edit',$comment->video_id );
    }
}
