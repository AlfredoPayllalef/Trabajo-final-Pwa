<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
 use App\Models\Category;

class CategoryController extends Controller
{

    public function getIndex()
    {
        $posts = Post::all(); 
        return view('category.index', compact('posts')); 
    }

    public function getNacionales()
    {
        $nacionales = Post::whereHas('category', function($query) {
            $query->where('name', 'Nacionales');
        })->where('habilitated', true)->latest()->get();

        return view('nacionales', compact('nacionales'));
    }

    public function getInternacionales()
    {
        $internacionales = Post::whereHas('category', function($query) {
            $query->where('name', 'Internacionales');
        })->where('habilitated', true)->latest()->get();

        return view('internacionales', compact('internacionales'));
    }


    public function misPosts()
    {
        $user = auth()->user();
        $posts = $user->posts;

        return view('misPosts', compact('posts')); 
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); 
        return view('category.show', compact('post'));
    }


    public function create()
    {
        $categories = Category::all(); 
        return view('category.create', compact('categories'));
    }

   
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all(); 

        return view('category.edit', compact('post', 'categories'));
    }



    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'poster' => 'nullable|image|max:2048',
    ]);

    $posterPath = null;
    if ($request->hasFile('poster')) {
        $poster = $request->file('poster');

        $posterName = time() . '_' . $poster->getClientOriginalName();
        $poster->move(public_path('posters'), $posterName);
        $posterPath = 'posters/' . $posterName;

    }

    $post = Post::create([
        'title' => $request->title,
        'poster' => $posterPath,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'habilitated' => $request->has('habilitated'),
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('category.show', $post->id)
        ->with('success', 'Post creado con éxito');
    }
    
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'poster' => 'nullable|image|max:2048',
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];
        $post->habilitated = $request->has('habilitated');

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $post->poster = $path;
        }

        $post->save();

        return redirect()->route('home')->with('success', 'El post fue actualizado correctamente.');
    }
    
    
}

