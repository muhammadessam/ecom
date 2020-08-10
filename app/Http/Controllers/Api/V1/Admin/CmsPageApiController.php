<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CmsPage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCmsPageRequest;
use App\Http\Requests\UpdateCmsPageRequest;
use App\Http\Resources\Admin\CmsPageResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsPageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cms_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CmsPageResource(CmsPage::with(['cat'])->get());
    }

    public function store(StoreCmsPageRequest $request)
    {
        $cmsPage = CmsPage::create($request->all());

        return (new CmsPageResource($cmsPage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CmsPageResource($cmsPage->load(['cat']));
    }

    public function update(UpdateCmsPageRequest $request, CmsPage $cmsPage)
    {
        $cmsPage->update($request->all());

        return (new CmsPageResource($cmsPage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsPage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
