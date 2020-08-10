<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\CouponUsage;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCouponUsageRequest;
use App\Http\Requests\StoreCouponUsageRequest;
use App\Http\Requests\UpdateCouponUsageRequest;
use App\Order;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CouponUsageController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('coupon_usage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CouponUsage::with(['coupon', 'customer', 'order'])->select(sprintf('%s.*', (new CouponUsage)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'coupon_usage_show';
                $editGate      = 'coupon_usage_edit';
                $deleteGate    = 'coupon_usage_delete';
                $crudRoutePart = 'coupon-usages';

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
            $table->addColumn('coupon_name', function ($row) {
                return $row->coupon ? $row->coupon->name : '';
            });

            $table->addColumn('customer_name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });

            $table->addColumn('order_serial', function ($row) {
                return $row->order ? $row->order->serial : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'coupon', 'customer', 'order']);

            return $table->make(true);
        }

        return view('admin.couponUsages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('coupon_usage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupons = Coupon::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orders = Order::all()->pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.couponUsages.create', compact('coupons', 'customers', 'orders'));
    }

    public function store(StoreCouponUsageRequest $request)
    {
        $couponUsage = CouponUsage::create($request->all());

        return redirect()->route('admin.coupon-usages.index');
    }

    public function edit(CouponUsage $couponUsage)
    {
        abort_if(Gate::denies('coupon_usage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupons = Coupon::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orders = Order::all()->pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $couponUsage->load('coupon', 'customer', 'order');

        return view('admin.couponUsages.edit', compact('coupons', 'customers', 'orders', 'couponUsage'));
    }

    public function update(UpdateCouponUsageRequest $request, CouponUsage $couponUsage)
    {
        $couponUsage->update($request->all());

        return redirect()->route('admin.coupon-usages.index');
    }

    public function show(CouponUsage $couponUsage)
    {
        abort_if(Gate::denies('coupon_usage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couponUsage->load('coupon', 'customer', 'order');

        return view('admin.couponUsages.show', compact('couponUsage'));
    }

    public function destroy(CouponUsage $couponUsage)
    {
        abort_if(Gate::denies('coupon_usage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couponUsage->delete();

        return back();
    }

    public function massDestroy(MassDestroyCouponUsageRequest $request)
    {
        CouponUsage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
