<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'score' => 'required|integer|min:1|max:5',
        ]);

        Rating::updateOrCreate(
            ['post_id' => $postId, 'user_id' => auth()->id()],
            ['score' => $request->score]
        );

        return back()->with('success', '¡Gracias por tu calificación!');
    }

}
