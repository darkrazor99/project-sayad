<?php

namespace App\Http\Controllers;

use App\Models\Drawing;
use App\Models\DrawingCategory;
use App\Models\Pdf;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\GetInTouch;
use App\Models\PdfCategory;
use App\Models\BasicArtical;
use App\Models\BlogCategory;
use App\Models\Videos;
use App\Models\VideosCategory;
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
        $books = Book::orderby('created_at', 'desc')->take(6)->get();
        $test = Book::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('books', [
            'articals' => $test,
            'show' => false,
            'books' => $books,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function showAr(string $id)
    {
        $books = Book::orderby('created_at', 'desc')->take(6)->get();
        $test = Book::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('books-ar', [
            'articals' => $test,
            'show' => false,
            'books' => $books,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }

    public function writer(string $name)
    {
        $books = Book::orderby('created_at', 'desc')->take(6)->get();
        $test = Book::where('writerName', $name)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('books', [
            'articals' => $test,
            'show' => false,
            'books' => $books,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function writerAr(string $name)
    {
        $books = Book::orderby('created_at', 'desc')->take(6)->get();
        $test = Book::where('writerName', $name)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('books-ar', [
            'articals' => $test,
            'show' => false,
            'books' => $books,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }

    public function showB(string $id)
    {
        $test = Blog::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog', [
            'articals' => $test,
            'category' => BlogCategory::get(),
            'hasVid' => false,
            'hasPdf' => false,
            'isStory' => false,
            'isArt' => false,

            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function showBAr(string $id)
    {
        $test = Blog::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog-ar', [
            'articals' => $test,
            'category' => BlogCategory::get(),
            'hasVid' => false,
            'hasPdf' => false,
            'isStory' => false,
            'isArt' => false,
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function showC(string $id)
    {
        $test = Pdf::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
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
    public function showCAr(string $id)
    {
        $test = Pdf::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
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

    public function showD(string $id)
    {
        $test = Videos::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
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
    public function showDAr(string $id)
    {
        $test = Videos::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
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
    public function showE(string $id)
    {
        $test = Drawing::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog', [
            'articals' => $test,
            'category' => DrawingCategory::get(),
            'hasVid' => false,
            'hasPdf' => false,
            'isStory' => false,
            'isArt' => true,

            'getInTouch' => GetInTouch::all()[0]
        ]);
    }
    public function showEAr(string $id)
    {
        $test = Drawing::where('category_id', $id)->orderby('created_at', 'desc')->with('category')->paginate(10);
        return view('blog-ar', [
            'articals' => $test,
            'category' => DrawingCategory::get(),
            'hasVid' => false,
            'hasPdf' => false,
            'isStory' => false,
            'isArt' => true,
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
