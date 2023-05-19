<?php
namespace App\Http\Controllers\API\BackEnd;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index()
   {
      return view('back-end.home');
   }
}
