<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GetInTouch;
use App\Models\BasicArtical;
use Illuminate\Http\Request;

class BasicArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $test = BasicArtical::where('isArabic', 0)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog', [
            'articals' => $test,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }

    public function indexAr()
    {
        $test = BasicArtical::where('isArabic', 1)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog-ar', [
            'articals' => $test,
            'category' => Category::get(),
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
        $isArabic = false;
        $all = BasicArtical::where('isArabic', 0)->orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = BasicArtical::where('id', $id)->with('category')->get();
        return view('detail', [
            'articals' => $all,
            'category' => Category::get(),
            'focus' => $focus,
            'isArabic' => $isArabic,
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function showAR(string $id)
    {
        $isArabic = true;
        $all = BasicArtical::where('isArabic', 1)->orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = BasicArtical::where('id', $id)->with('category')->get();
        return view('detail', [
            'articals' => $all,
            'category' => Category::get(),
            'focus' => $focus,
            'isArabic' => $isArabic,
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
