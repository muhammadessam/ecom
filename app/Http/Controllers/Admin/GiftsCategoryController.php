<?php

namespace App\Http\Controllers\Admin;

use App\GiftsCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGiftsCategoryRequest;
use App\Http\Requests\StoreGiftsCategoryRequest;
use App\Http\Requests\UpdateGiftsCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GiftsCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('gifts_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftsCategories = GiftsCategory::all();

        return view('admin.giftsCategories.index', compact('giftsCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('gifts_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.giftsCategories.create');
    }

    public function store(StoreGiftsCategoryRequest $request)
    {
        $giftsCategory = GiftsCategory::create($request->all());

        if ($request->input('img', false)) {
            $giftsCategory->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $giftsCategory->id]);
        }

        return redirect()->route('admin.gifts-categories.index');
    }

    public function edit(GiftsCategory $giftsCategory)
    {
        abort_if(Gate::denies('gifts_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.giftsCategories.edit', compact('giftsCategory'));
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

        return redirect()->route('admin.gifts-categories.index');
    }

    public function show(GiftsCategory $giftsCategory)
    {
        abort_if(Gate::denies('gifts_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.giftsCategories.show', compact('giftsCategory'));
    }

    public function destroy(GiftsCategory $giftsCategory)
    {
        abort_if(Gate::denies('gifts_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftsCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyGiftsCategoryRequest $request)
    {
        GiftsCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('gifts_category_create') && Gate::denies('gifts_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new GiftsCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
