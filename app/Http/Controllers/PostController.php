<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Post::latest()->get();
        return view('admin.post.index', [
            'all_data'  => $data,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('status', true)->get();
        $tags = Tag::where('status', true)->get();
        return view('admin.post.create', [
            'cats'      => $cats,
            'tags'      => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required'],
        ]);


        // Standard post upload 
        $file_name = '';
        if ($request->hasFile('image')) {
            $file_name = $this->fileUpload($request, 'image', 'media/posts/');
        }


        // Gallery Post upload 
        $gallery = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $gall) {
                $gallery_file_name = md5(time() . rand()) . '.' . $gall->getClientOriginalExtension();
                $gall->move('media/posts/', $gallery_file_name);
                array_push($gallery, $gallery_file_name);
            }
        }


        $post_type_arr = [
            'post_type'         => $request->ptype,
            'post_image'        => $file_name,
            'post_gallery'      => $gallery,
            'post_video'        => $this->videoLink($request->video),
            'post_audio'        => $request->audio,
            'post_quote'        => $request->quote,
        ];


        // Data send 
        $post = Post::create([
            'title'     => $request->title,
            'slug'     => $this->makeSlug($request->title),
            'user_id'   => Auth::user()->id,
            'content'   => $request->content,
            'featured'   => json_encode($post_type_arr),
        ]);


        $post->categories()->attach($request->pcat);
        $post->tags()->attach($request->ptag);

        return redirect()->route('post.index')->with('success', 'Post added successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cats = Category::where('status', true)->get();
        $tags = Tag::where('status', true)->get();


        // Post category set
        $cat_arr = [];
        foreach ($post->categories as $cat) {
            array_push($cat_arr, $cat->id);
        }


        //tags Arr 
        $tag_arr = [];
        foreach ($post->tags as $tag) {
            array_push($tag_arr, $tag->id);
        }




        return view('admin.post.edit', [
            'cats'      => $cats,
            'tags'      => $tags,
            'post'      => $post,
            'cat_arr'   => $cat_arr,
            'tag_arr'   => $tag_arr
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->categories()->detach($post->categories);
        $post->tags()->detach($post->tags);
        $post->delete();

        return back();
    }
}
