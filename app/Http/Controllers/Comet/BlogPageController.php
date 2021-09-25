<?php

namespace App\Http\Controllers\Comet;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPageController extends Controller
{
    /**
     * Show Blog Page 
     */
    public function showBlog()
    {
        $posts = Post::latest()->get();
        return view('comet.blog', [
            'all_posts'      => $posts,
        ]);
    }



    public function showCategoryBlog($slug)
    {

        $all_data = Category::where('slug', $slug)->first();
        return view('comet.category-blog', [
            'all_posts'  => $all_data->posts
        ]);
    }


    public function searchBlog(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%' . $request->s . '%')->get();
        return view('comet.search', [
            'all_posts'     => $posts
        ]);
    }
}
