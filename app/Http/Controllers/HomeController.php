<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class HomeController extends Controller
{
    public function getHome()
    {
        $posts = Post::latest()->take(6)->get(); 
        return view('home', compact('posts'));
        
    }
}


