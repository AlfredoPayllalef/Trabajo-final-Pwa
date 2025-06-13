<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Post;

class ComentarioController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comentario = new Comentario();
        $comentario->user_id = auth()->id();
        $comentario->post_id = $postId;
        $comentario->content = $request->input('content');
        $comentario->save();

        return redirect()->back()->with('success', 'Comentario publicado.');
    }
}

