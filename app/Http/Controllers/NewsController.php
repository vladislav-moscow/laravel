<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('news.index', [
            'newsList' => News::paginate(10)
        ]);
    }

    public function show(News $news): Factory|View|Application
    {
        return view("news.show", [
            'news'=>$news
        ]);
    }
}
