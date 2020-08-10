<?php

namespace App\Http\Controllers\Admin;

use App\CmsCategory;
use App\CmsPage;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCmsPageRequest;
use App\Http\Requests\StoreCmsPageRequest;
use App\Http\Requests\UpdateCmsPageRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsPageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cms_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsPages = CmsPage::all();

        return view('admin.cmsPages.index', compact('cmsPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('cms_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cats = CmsCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cmsPages.create', compact('cats'));
    }

    public function store(StoreCmsPageRequest $request)
    {
        $cmsPage = CmsPage::create($request->all());

        return redirect()->route('admin.cms-pages.index');
    }

    public function edit(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cats = CmsCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cmsPage->load('cat');

        return view('admin.cmsPages.edit', compact('cats', 'cmsPage'));
    }

    public function update(UpdateCmsPageRequest $request, CmsPage $cmsPage)
    {
        $cmsPage->update($request->all());

        return redirect()->route('admin.cms-pages.index');
    }

    public function show(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsPage->load('cat');

        return view('admin.cmsPages.show', compact('cmsPage'));
    }

    public function destroy(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyCmsPageRequest $request)
    {
        CmsPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
