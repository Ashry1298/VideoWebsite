<?php
namespace App\Http\Controllers\UI\BackEnd;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackEndHomeController extends Controller
{
   public function index()
   {
      $comments=Comment::orderby('id','desc')->paginate(20);
      $videosCount=Video::count();
      $commentsCount=Comment::count();
      $skillsCount=Skill::count();
      $tagsCount=Tag::count();
      return view('back-end.home',compact('comments','videosCount','commentsCount','skillsCount','tagsCount'));
   }
}
