<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewsFormRequest;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news);
    }

    public function show($id)
    {
        $news = News::find($id);
        return response()->json($news);
    }

    public function store(NewsFormRequest $request)
    {
        $data = $request->validated();

        $news = new News();
        $news->name = $data['name'];
        $news->slug = $data['slug'];
        $news->description = $data['description'];
        $news->yt_iframe = $data['yt_iframe'] ?? '';
        $news->meta_title = $data['meta_title'];
        $news->meta_description = $data['meta_description'];
        $news->meta_keyword = $data['meta_keyword'];
        $news->status = $request->status == true ? '1' : '0';

        $news->save();

        return response()->json($news, 201);
    }

    public function update(NewsFormRequest $request, $id)
    {
        $data = $request->validated();

        $news = News::findOrFail($id);
        $news->name = $data['name'];
        $news->slug = $data['slug'];
        $news->description = $data['description'];
        $news->yt_iframe = $data['yt_iframe'] ?? '';
        $news->meta_title = $data['meta_title'];
        $news->meta_description = $data['meta_description'];
        $news->meta_keyword = $data['meta_keyword'];
        $news->status = $request->status == true ? '1' : '0';

        $news->save();

        return response()->json($news);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json(null, 204);
    }
}