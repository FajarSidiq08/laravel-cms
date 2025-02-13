<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $articles = Article::with('Category')->whereStatus(1)->where('title', 'like', '%' .$keyword. '%')->latest()->paginate(2);
        } else {
            $articles = Article::with('Category')->whereStatus(1)->latest()->paginate(2);
        }

        return view('front.home.index', [
            'latest_post' => Article::latest()->whereStatus(1)->first(),
            'articles' => $articles,
            'categories' => Category::latest()->get(),
        ]);
    }
}
