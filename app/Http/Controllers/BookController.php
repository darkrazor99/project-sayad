<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\GetInTouch;
use App\Models\BasicArtical;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Book::orderby('created_at', 'desc')->with('category')->paginate(10);
        $books = Book::orderby('created_at','desc')->take(6)->get();

        return view('books', [
            'articals' => $test,
            'books'=>$books,
            'show' => false,
            'category' => Category::get(),
            'getInTouch' => GetInTouch::all()[0]
        ]);
    }

    public function indexAr()
    {
        $test = Book::orderby('created_at', 'desc')->with('category')->paginate(10);
        $books = Book::orderby('created_at','desc')->take(6)->get();

        return view('books-ar', [
            'articals' => $test,
            'books'=>$books,
            'show' => false,
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
        $focus = Book::where('id', $id)->with('category')->get();
        $rest = BasicArtical::where('book_id', $focus[0]->id)->with('book')->orderby('created_at', 'desc')->paginate(10);
        $books = Book::orderby('created_at','desc')->take(6)->get();

        $isArabic = false;
        if ($focus->count() > 0) {
            return view('books', [
                'articals' => $rest,
                'books' => $books,
                'show' => true,
                'mycat' => $focus[0]->category,
                'category' => Category::get(),
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return back();
        }
    }
    public function showAr(string $id)
    {
        $focus = Book::where('id', $id)->with('category')->get();
        $rest = BasicArtical::where('book_id', $focus[0]->id)->with('book')->orderby('created_at', 'desc')->paginate(10);
        // dd($rest);
        $books = Book::orderby('created_at','desc')->take(6)->get();

        $isArabic = false;
        if ($focus->count() > 0) {
            return view('books-ar', [
                'articals' => $rest,
                'show' => true,
                'books'=>$books,
                'mycat' => $focus[0]->category,
                'category' => Category::get(),
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return back();
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
