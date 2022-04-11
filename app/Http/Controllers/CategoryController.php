<?php

/*namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function index(): Factory|View|Application
    {
        return view('categoriesIndex')->with('categories', Category::getCategories());
    }

    public static function show($id): Factory|View|Application
    {
        return view('news.index')->with('news', News::getNewsByCategoryId($id));
    }
}*/


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): Factory|View|Application
    {
        $category = app(Category::class);
        return view('category.index', [
            'categoryArray' => $category-> getCategoriesView()
        ]);
    }
}
