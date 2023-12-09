<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GetInTouch;
use App\Models\BasicArtical;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $isArabic=false;
        $test = BasicArtical::where('category_id', $id)->where('isArabic', 0)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog', [
            'articals' => $test,
            'isArabic'=>$isArabic,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function showAr(string $id)
    {
        $isArabic=true;
        $test = BasicArtical::where('category_id', $id)->where('isArabic', 1)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog-ar', [
            'articals' => $test,
            'isArabic'=>$isArabic,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
