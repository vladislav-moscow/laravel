<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Events\NewsEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\UploadService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {

        return view('admin.news.index', [
            'newsList' =>News::with('category')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.news.create', [
            'categories' => Category::select("id", "title")->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EditRequest $request
     * @return RedirectResponse
     */
    public function store(EditRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $data['image'] = $file->storeAs('news', $fileName);
        }

        $news = News::create($data);

        if($news) {
            event(new NewsEvent($news));
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news): Application|Factory|View
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {

        $validatedData = $request->validated();

        if($request->hasFile('image')) {
            $service = app(UploadService::class);
            $validatedData['image'] = $service->uploadFile($request->file('image'));
        }

        $status = $news->fill($validatedData)->save();

        /*if($status) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error',  __('messages.admin.news.update.fail'));*/
        if(!$status) {
            return back()->with('error',  __('messages.admin.news.update.fail'));
        }
        return redirect()->route('admin.news.index')
            ->with('success', __('messages.admin.news.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        try {
             $news->delete();
                return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error( __('messages.admin.news.delete.fail') );
            return response()->json(['status' => 'error'], 400);
        }

    }
}
