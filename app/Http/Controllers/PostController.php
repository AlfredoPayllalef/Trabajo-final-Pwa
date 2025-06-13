<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{

public function show($id)
{
    $post = Post::with('category', 'user', 'ratings', 'comentarios')->findOrFail($id);
    return view('category.show', compact('post'));
}

}
