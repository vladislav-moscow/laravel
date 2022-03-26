<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index(int $id): Factory|View|Application
    {
        $allNews = $this->getNews();
        $news = [];

        foreach ($allNews as $value) {
            if ($value['category_id'] === $id) {
                $news[] = $value;
            }
        }

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id): Factory|View|Application
    {
        $news = $this->getNews($id);
        return view("news.show", [
            'news'=>$news
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
