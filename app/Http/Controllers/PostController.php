<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


class PostController extends Controller
{
        public function getPosts() {
            return view('userviews.posts');
        }
   

}