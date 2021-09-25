<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Asrafulhaq\Belayat\Belayat;

class CategoryController extends Controller
{

    /**
     * Test Method
     */

    public function haq()
    {
        return Belayat::makeSlug('My name is Asraful Haquw');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->get();
        return view('admin.post.cat.index', [
            'all_data'      => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'      => 'required'
        ]);

        Category::create([
            'name'      => $request->name,
            'slug'      => $this->makeSlug($request->name),
        ]);

        return back()->with('success', 'Category added successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    /**
     * Cat Ststus update 
     */
    public function catStatus($id)
    {
        $data = Category::find($id);

        if ($data->status == true) {
            $data->status = false;
            $msg = 'Category unpublished successful';
        } else {
            $data->status = true;
            $msg = 'Category published successful';
        }

        $data->update();

        return back()->with('success', $msg);
    }
}
