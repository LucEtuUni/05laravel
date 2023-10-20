<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
     // Afficher tous les Post
    public function index() {
        $posts = Post::latest()->paginate(10); 


        return view("posts.index", compact("posts"));
    }

    // Créer un nouveau Post
    public function create() {
        return view("posts.edit");
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            "picture" => 'bail|required|image|max:1024',
            "content" => 'bail|required',
        ]);
        
        $chemin_image = $request->picture->store("posts");
    
        $post = auth()->user()->posts()->create([
            'title' => $request->input('title'),
            'picture' => $chemin_image, 
            'content' => $request->input('content'),
        ]);
    
        return redirect(route("posts.index"));
    }

    // Afficher un Post
    public function show(Post $post) {
        return view("posts.show", compact("post"));
    }

    // Editer un Post enregistré
    public function edit(Post $post) {
        return view("posts.edit", compact("post"));
    }

    // Mettre à jour un Post
    public function update(Request $request, Post $post) {
     
        $this->authorize('update', $post);
  
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ];
        if ($request->has("picture")) {
           
            $rules["picture"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        
        if ($request->has("picture")) {

            Storage::delete($post->picture);
            $chemin_image = $request->picture->store("posts");
        }

        $post->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $post->picture,
            "content" => $request->content
        ]);

        return redirect(route("posts.show", $post));
    }

    // Supprimer un Post
    public function destroy(Post $post) {
        Storage::delete($post->picture);
        $post->deleteWithComments();

        // Redirection route "posts.index"
        return redirect(route('posts.index'));
    }
}