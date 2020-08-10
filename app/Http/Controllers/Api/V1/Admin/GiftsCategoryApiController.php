<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\GiftsCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreGiftsCategoryRequest;
use App\Http\Requests\UpdateGiftsCategoryRequest;
use App\Http\Resources\Admin\GiftsCategoryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GiftsCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('gifts_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GiftsCategoryResource(GiftsCategory::all());
    }

    public function store(StoreGiftsCategoryRequest $request)
    {
        $giftsCategory = GiftsCategory::create($request->all());

        if ($request->input('img', false)) {
            $giftsCategory->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
        }

        return (new GiftsCategoryResource($giftsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GiftsCategory $giftsCategory)
    {
        abort_if(Gate::denies('gifts_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GiftsCategoryResource($giftsCategory);
    }

    public function update(UpdateGiftsCategoryRequest $request, GiftsCategory $giftsCategory)
    {
        $giftsCategory->update($request->all());

        if ($request->input('img', false)) {
            if (!$giftsCategory->img || $request->input('img') !== $giftsCategory->img->file_name) {
                if ($giftsCategory->img) {
                    $giftsCategory->img->delete();
                }

                $giftsCategory->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
            }
        } elseif ($giftsCategory->img) {
            $giftsCategory->img->delete();
        }

        return (new GiftsCategoryResource($giftsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GiftsCategory $giftsCategory)
    {
        abort_if(Gate::denies('gifts_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftsCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
