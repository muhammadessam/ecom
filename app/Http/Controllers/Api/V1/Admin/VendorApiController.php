<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Http\Resources\Admin\VendorResource;
use App\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VendorResource(Vendor::all());
    }

    public function store(StoreVendorRequest $request)
    {
        $vendor = Vendor::create($request->all());

        if ($request->input('img', false)) {
            $vendor->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
        }

        if ($request->input('cover_img', false)) {
            $vendor->addMedia(storage_path('tmp/uploads/' . $request->input('cover_img')))->toMediaCollection('cover_img');
        }

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VendorResource($vendor);
    }

    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());

        if ($request->input('img', false)) {
            if (!$vendor->img || $request->input('img') !== $vendor->img->file_name) {
                if ($vendor->img) {
                    $vendor->img->delete();
                }

                $vendor->addMedia(storage_path('tmp/uploads/' . $request->input('img')))->toMediaCollection('img');
            }
        } elseif ($vendor->img) {
            $vendor->img->delete();
        }

        if ($request->input('cover_img', false)) {
            if (!$vendor->cover_img || $request->input('cover_img') !== $vendor->cover_img->file_name) {
                if ($vendor->cover_img) {
                    $vendor->cover_img->delete();
                }

                $vendor->addMedia(storage_path('tmp/uploads/' . $request->input('cover_img')))->toMediaCollection('cover_img');
            }
        } elseif ($vendor->cover_img) {
            $vendor->cover_img->delete();
        }

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
