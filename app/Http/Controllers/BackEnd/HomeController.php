<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BackEnd\BackEndController;

class HomeController extends Controller
{
   public function index()
   {
      return view('back-end.home');
   }
}
