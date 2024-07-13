<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    // Méthode pour afficher la liste des posts
    public function index(Request $request)
    {
        // Première option pour récupérer tous les posts triés par ordre de création, du plus récent au plus ancien
        // $posts = Post::latest()->get();
        // return view('posts.index', [
        //     'posts' => $posts
        // ]);

        return $this->postsView($request->search ? ['search' => $request->search] : []);
    }

    public function postsByCategory(Category $category)
    {
       return $this->postsView(['category' => $category]);
    }

    public function postsByTag(Tag $tag)
    {
        return $this->postsView(['tag' => $tag]);

    }

    public function postsView(array $filters)
    {
        return view('posts.index', [
            'posts' => Post::filters($filters)->latest()->paginate(10),
        ]);
    }

    // Méthode pour afficher un post spécifique
    // () 1er(model) 2em ()
    public function show(Post $post)
    {
        // Retourne la vue 'posts.show' avec les données du post spécifique
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
