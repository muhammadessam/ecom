<?php

namespace App\Http\Controllers\Admin;

use App\CmsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCmsCategoryRequest;
use App\Http\Requests\StoreCmsCategoryRequest;
use App\Http\Requests\UpdateCmsCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cms_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsCategories = CmsCategory::all();

        return view('admin.cmsCategories.index', compact('cmsCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('cms_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmsCategories.create');
    }

    public function store(StoreCmsCategoryRequest $request)
    {
        $cmsCategory = CmsCategory::create($request->all());

        return redirect()->route('admin.cms-categories.index');
    }

    public function edit(CmsCategory $cmsCategory)
    {
        abort_if(Gate::denies('cms_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmsCategories.edit', compact('cmsCategory'));
    }

    public function update(UpdateCmsCategoryRequest $request, CmsCategory $cmsCategory)
    {
        $cmsCategory->update($request->all());

        return redirect()->route('admin.cms-categories.index');
    }

    public function show(CmsCategory $cmsCategory)
    {
        abort_if(Gate::denies('cms_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsCategory->load('catCmsPages');

        return view('admin.cmsCategories.show', compact('cmsCategory'));
    }

    public function destroy(CmsCategory $cmsCategory)
    {
        abort_if(Gate::denies('cms_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyCmsCategoryRequest $request)
    {
        CmsCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
