<?php

namespace Step2dev\LazySeoTools\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Step2dev\LazySeoTools\Models\Seo;
use Illuminate\Http\Request;

class SeoApiController extends Controller
{
    public function index()
    {
        return Seo::paginate(20);
    }

    public function show($id)
    {
        return Seo::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Seo::create($request->only(['title', 'description', 'keywords', 'seoable_type', 'seoable_id']));
    }

    public function update(Request $request, $id)
    {
        $seo = Seo::findOrFail($id);
        $seo->update($request->only(['title', 'description', 'keywords']));
        return $seo;
    }

    public function destroy($id)
    {
        $seo = Seo::findOrFail($id);
        $seo->delete();
        return response()->json(['deleted' => true]);
    }
}
