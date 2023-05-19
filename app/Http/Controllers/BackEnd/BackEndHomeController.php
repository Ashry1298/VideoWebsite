<?php
namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Comment;
use App\Models\Video;

class BackEndHomeController extends Controller
{
   public function index()
   {
      $comments=Comment::orderby('id','desc')->paginate(20);
      return view('back-end.home',compact('comments'));
   }
}
