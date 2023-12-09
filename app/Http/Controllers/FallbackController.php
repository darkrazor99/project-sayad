<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Carousel;
use App\Models\GetInTouch;
use Illuminate\Http\Request;

class FallbackController extends Controller
{
    public function __invoke()
    {
        return view('index', [
            'slides' => Carousel::all(),
            'getInTouch' => GetInTouch::all()[0],
            'info' => Info::all()
        ]);


    }
}
