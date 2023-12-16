<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use App\Models\GetInTouch;
use Illuminate\Http\Request;
use App\Models\VideosCategory;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Videos::orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog', [
            'articals' => $test,
            'category' => VideosCategory::get(),
            'hasVid' => true,
            'hasPdf' => false,
            'isStory' => false,
            'isArt' => false,
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function indexAr()
    {
        $test = Videos::orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog-ar', [
            'articals' => $test,
            'category' => VideosCategory::get(),
            'hasVid' => true,
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
        $test = Videos::orderby('created_at', 'desc')->with('category')->paginate(10);
        $isArabic = false;
        $all = Videos::orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = Videos::where('id', $id)->with('category')->get();
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $all,
                'category' => VideosCategory::get(),
                'focus' => $focus,
                'isArabic' => $isArabic,
                'hasVid' => true,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return view('blog', [
                'articals' => $test,
                'hasVid' => true,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'category' => VideosCategory::get(),
                'getInTouch' => GetInTouch::all()[0]
            ]);
        }

    }
    public function showAR(string $id)
    {
        $test = Videos::orderby('created_at', 'desc')->with('category')->paginate(10);
        $isArabic = true;
        $all = Videos::orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = Videos::where('id', $id)->with('category')->get();
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $all,
                'category' => VideosCategory::get(),
                'focus' => $focus,
                'hasVid' => true,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'isArabic' => $isArabic,
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return view('blog-ar', [
                'articals' => $test,
                'hasVid' => true,
                'hasPdf' => false,
                'isStory' => false,
                'isArt' => false,
                'category' => VideosCategory::get(),
                'getInTouch' => GetInTouch::all()[0]
            ]);
        }
    }

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
