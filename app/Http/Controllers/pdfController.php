<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\GetInTouch;
use App\Models\PdfCategory;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Pdf::orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog', [
            'articals' => $test,
            'category' => PdfCategory::get(),
            'hasVid' => false,
            'hasPdf' => true,
            'isStory' => false,
            'isArt' => false,
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function indexAr()
    {
        $test = Pdf::orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog-ar', [
            'articals' => $test,
            'category' => PdfCategory::get(),
            'hasVid' => false,
            'hasPdf' => true,
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
        $test = Pdf::orderby('created_at', 'desc')->with('category')->paginate(10);
        $isArabic = false;
        $all = Pdf::orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = Pdf::where('id', $id)->with('category')->get();
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $all,
                'category' => PdfCategory::get(),
                'focus' => $focus,
                'isArabic' => $isArabic,
                'hasVid' => false,
                'hasPdf' => true,
                'isStory' => false,
                'isArt' => false,
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return view('blog', [
                'articals' => $test,
                'hasVid' => false,
                'hasPdf' => true,
                'isStory' => false,
                'isArt' => false,
                'category' => PdfCategory::get(),
                'getInTouch' => GetInTouch::all()[0]
            ]);
        }

    }
    public function showAR(string $id)
    {
        $test = Pdf::orderby('created_at', 'desc')->with('category')->paginate(10);
        $isArabic = true;
        $all = Pdf::orderby('created_at', 'desc')->take(6)->with('category')->get();
        $focus = Pdf::where('id', $id)->with('category')->get();
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $all,
                'category' => PdfCategory::get(),
                'focus' => $focus,
                'hasVid' => false,
                'hasPdf' => true,
                'isStory' => false,
                'isArt' => false,
                'isArabic' => $isArabic,
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return view('blog-ar', [
                'articals' => $test,
                'hasVid' => false,
                'hasPdf' => true,
                'isStory' => false,
                'isArt' => false,
                'category' => PdfCategory::get(),
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
