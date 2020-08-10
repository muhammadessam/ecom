<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVendorRequest;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Vendor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Vendor::query()->select(sprintf('%s.*', (new Vendor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'vendor_show';
                $editGate      = 'vendor_edit';
                $deleteGate    = 'vendor_delete';
                $crudRoutePart = 'vendors';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('img', function ($row) {
                if ($photo = $row->img) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('is_active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_active ? 'checked' : null) . '>';
            });
            $table->editColumn('commision_annual_price', function ($row) {
                return $row->commision_annual_price ? $row->commision_annual_price : "";
            });

            $table->editColumn('commision_type', function ($row) {
                return $row->commision_type ? Vendor::COMMISION_TYPE_RADIO[$row->commision_type] : '';
            });
            $table->editColumn('is_knet_supported', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_knet_supported ? 'checked' : null) . '>';
            });
            $table->editColumn('is_cc_supported', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_cc_supported ? 'checked' : null) . '>';
            });
            $table->editColumn('cover_img', function ($row) {
                if ($photo = $row->cover_img) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('minimum_charge', function ($row) {
                return $row->minimum_charge ? $row->minimum_charge : "";
            });
            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : "";
            });
            $table->editColumn('facebook', function ($row) {
                return $row->facebook ? $row->facebook : "";
            });
            $table->editColumn('twitter', function ($row) {
                return $row->twitter ? $row->twitter : "";
            });
            $table->editColumn('instagram', function ($row) {
                return $row->instagram ? $row->instagram : "";
            });
            $table->editColumn('linkedin', function ($row) {
                return $row->linkedin ? $row->linkedin : "";
            });
            $table->editColumn('youtube', function ($row) {
                return $row->youtube ? $row->youtube : "";
            });
            $table->editColumn('pinterest', function ($row) {
                return $row->pinterest ? $row->pinterest : "";
            });
            $table->editColumn('openning', function ($row) {
                return $row->openning ? $row->openning : "";
            });
            $table->editColumn('closing', function ($row) {
                return $row->closing ? $row->closing : "";
            });
            $table->editColumn('phone_1', function ($row) {
                return $row->phone_1 ? $row->phone_1 : "";
            });
            $table->editColumn('phone_2', function ($row) {
                return $row->phone_2 ? $row->phone_2 : "";
            });
            $table->editColumn('phone_3', function ($row) {
                return $row->phone_3 ? $row->phone_3 : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'img', 'is_active', 'is_knet_supported', 'is_cc_supported', 'cover_img']);

            return $table->make(true);
        }

        return view('admin.vendors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendors.create');
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vendor->id]);
        }

        return redirect()->route('admin.vendors.index');
    }

    public function edit(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendors.edit', compact('vendor'));
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

        return redirect()->route('admin.vendors.index');
    }

    public function show(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->load('vendorBrands', 'vendorOrders');

        return view('admin.vendors.show', compact('vendor'));
    }

    public function destroy(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyVendorRequest $request)
    {
        Vendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vendor_create') && Gate::denies('vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vendor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
