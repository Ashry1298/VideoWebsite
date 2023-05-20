<?php

namespace App\Http\Controllers\API\BackEnd;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Resources\Api\BackEnd\CommentResource;

class BackEndHomeController extends Controller
{
   use HandleResponse;
   public function index()
   {
      $comments = Comment::orderby('id', 'desc')->paginate(20);
      $rows = CommentResource::collection($comments);
      $videosCount = Video::count();
      $commentsCount = Comment::count();
      $skillsCount = Skill::count();
      $tagsCount = Tag::count();
      $data = [
         'videosCount' =>  $videosCount,
         'commentsCount' =>  $commentsCount,
         'skillsCount' => $skillsCount,
         'tagsCount' => $tagsCount,
         'RecentComments'=>$rows,
      ];
      return response()->json($this->handleCrudResponse($data, 'Success'));
   }
}
