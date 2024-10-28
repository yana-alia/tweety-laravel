<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function __invoke()
    {
        return view('explore', [
            'tweets' => Tweet::orderBy('created_at', 'desc')->paginate(15),
            'user' => auth()->user()
        ]);
    }
}
