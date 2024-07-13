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

        $posts = Post::query();

        if ($search = $request->search) {
             $posts->where(fn (Builder $requery) => $requery
             ->where("title","like","%". $search ."%")
             ->orWhere("content","like","%". $search ."%")
        );
        };

        // Deuxième option (plus concise) pour récupérer les posts paginés, 10 par page, triés par ordre de création
        return view('posts.index', [
            'posts' => $posts->latest()->paginate(10),
        ]);
    }

    public function postsByCategory(Category $category)
    {
        return view('posts.index', [

            // 'posts' => $category->posts()->latest()->paginate(10),

            'posts' => Post::where(
                'category_id', $category->id
            )->latest()->paginate(10)
        ]);

    }

    public function postsByTag(Tag $tag)
    {
        return view('posts.index', [

            // 'posts' => $tag->posts()->latest()->paginate(10),

            'posts' => Post::whereRelation(
                'tags' , 'tags.id' , $tag->id
            )->latest()->paginate(10)

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
