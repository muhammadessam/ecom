<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CmsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCmsCategoryRequest;
use App\Http\Requests\UpdateCmsCategoryRequest;
use App\Http\Resources\Admin\CmsCategoryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cms_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CmsCategoryResource(CmsCategory::all());
    }

    public function store(StoreCmsCategoryRequest $request)
    {
        $cmsCategory = CmsCategory::create($request->all());

        return (new CmsCategoryResource($cmsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CmsCategory $cmsCategory)
    {
        abort_if(Gate::denies('cms_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CmsCategoryResource($cmsCategory);
    }

    public function update(UpdateCmsCategoryRequest $request, CmsCategory $cmsCategory)
    {
        $cmsCategory->update($request->all());

        return (new CmsCategoryResource($cmsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CmsCategory $cmsCategory)
    {
        abort_if(Gate::denies('cms_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
