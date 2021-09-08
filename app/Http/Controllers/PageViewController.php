<?php

namespace App\Http\Controllers;

use App\Models\PageView;
use App\Http\Requests\SavePageView;

class PageViewController extends Controller
{
    public function save(SavePageView $request)
    {
        return response()->json(PageView::create($request->validated()));
    }
}
