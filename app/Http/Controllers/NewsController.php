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
    public function index(string $title): Factory|View|Application
    {
        $news = app(News::class);

        return view('news.index', [
            'newsList' => $news->getNews()
        ]);
    }

    public function show(string $title, int $id): Factory|View|Application
    {
        $news = app(News::class);

        return view("news.show", [
            'news'=>$news->getNewsById($id)
        ]);
    }

    public function addNews(): Factory|View|Application
    {
        return view('news.add');
    }
    public function about(): Factory|View|Application
    {
        return view('about');
    }
    public function discover(): Factory|View|Application
    {
        return view('discover');
    }
}
