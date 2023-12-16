<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\blogCategory;
use App\Models\GetInTouch;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = blog::orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog', [
            'articals' => $test,
            'category' => blogCategory::get(),
            'hasVid' => false,
            'hasPdf' => false,
            'isStory' => false,
            'isArt' => false,
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function indexAr()
    {
        $test = blog::orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog-ar', [
            'articals' => $test,
            'category' => blogCategory::get(),
            'hasVid' => false,
            'hasPdf' => false,
            'isStory' => false,
            'isArt' => false,
            'getInTouch' => GetInTouch::all()[0]
        ]);
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
        $test = blog::orderby('created_at', 'desc')->with('category')->paginate(10);
        $isArabic = false;
        $all = blog::orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = blog::where('id', $id)->with('category')->get();
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $all,
                'category' => blogCategory::get(),
                'focus' => $focus,
                'isArabic' => $isArabic,
                'hasVid' => false,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return view('blog', [
                'articals' => $test,
                'hasVid' => false,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'category' => blogCategory::get(),
                'getInTouch' => GetInTouch::all()[0]
            ]);
        }

    }
    public function showAR(string $id)
    {
        $test = blog::orderby('created_at', 'desc')->with('category')->paginate(10);
        $isArabic = true;
        $all = blog::orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = blog::where('id', $id)->with('category')->get();
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $all,
                'category' => blogCategory::get(),
                'focus' => $focus,
                'hasVid' => false,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'isArabic' => $isArabic,
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return view('blog-ar', [
                'articals' => $test,
                'hasVid' => false,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'category' => blogCategory::get(),
                'getInTouch' => GetInTouch::all()[0]
            ]);
        }
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
