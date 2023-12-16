<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

        //
    }

    public function indexAr()
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
        // $focus = BasicArtical::where('id', $id)->get();
        // $rest = BasicArtical::where('book_id', $focus[0]->book_id)->orderby('created_at', 'desc')->paginate(
        //     $perPage = 1,
        //     $page = $num
        // );
        // dd(request('page'));
        $focus = Book::where('id', $id)->get();
        $num = (request('page') + 0);
        $rest = BasicArtical::where('book_id', $focus[0]->id)->orderby('created_at', 'asc')->paginate(
            $perPage = 1,
            $columns = ['*'],
            $pageName = 'page',
            $page = $num
        );
        // dd($rest);
        $isArabic = false;
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $rest,
                'category' => Category::get(),
                // 'focus' => $focus,
                'hasVid' => false,
                'hasPdf' => false,
                'isStory' => true,
                'isArt'=>false,
                'isArabic' => $isArabic,
                'getInTouch' => GetInTouch::all()[0]
            ]);
        } else {
            return back();
        }

    }
    public function showAR(string $id)
    {
        $focus = BasicArtical::where('id', $id)->with('book')->get();
        $rest = BasicArtical::where('book_id', $focus[0]->book_id)->orderby('created_at', 'desc')->paginate(1);

        $isArabic = true;
        if ($focus->count() > 0) {
            return view('detail', [
                'articals' => $rest,
                'category' => Category::get(),
                'focus' => $focus,
                'hasVid' => false,
                'hasPdf' => false,
                'isStory' => true,
                'isArt'=>false,
                'isArabic' => $isArabic,
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
