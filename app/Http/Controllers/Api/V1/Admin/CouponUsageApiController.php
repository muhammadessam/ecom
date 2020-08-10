<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CouponUsage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponUsageRequest;
use App\Http\Requests\UpdateCouponUsageRequest;
use App\Http\Resources\Admin\CouponUsageResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CouponUsageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('coupon_usage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CouponUsageResource(CouponUsage::with(['coupon', 'customer', 'order'])->get());
    }

    public function store(StoreCouponUsageRequest $request)
    {
        $couponUsage = CouponUsage::create($request->all());

        return (new CouponUsageResource($couponUsage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CouponUsage $couponUsage)
    {
        abort_if(Gate::denies('coupon_usage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CouponUsageResource($couponUsage->load(['coupon', 'customer', 'order']));
    }

    public function update(UpdateCouponUsageRequest $request, CouponUsage $couponUsage)
    {
        $couponUsage->update($request->all());

        return (new CouponUsageResource($couponUsage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CouponUsage $couponUsage)
    {
        abort_if(Gate::denies('coupon_usage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couponUsage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
