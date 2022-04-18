<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.categories.index', [
            'categories' => Category::active()->withCount('news')->paginate(5)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {

        $category = Category::create($request->validated());
        if($category) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.create.success'));
        }
        return back()->with('error', __('messages.admin.categories.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): View|Factory|Application
    {

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Category $category): RedirectResponse
    {

        $status = $category->fill($request->validated())->save();

        if($status) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.update.success'));
        }
        return back()->with('error', __('messages.admin.categories.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();
            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error(__('messages.admin.categories.delete.fail'));
            return response()->json(['status' => 'error'], 400);
        }
    }
}
