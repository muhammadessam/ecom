<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\GiftCardUsage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGiftCardUsageRequest;
use App\Http\Requests\UpdateGiftCardUsageRequest;
use App\Http\Resources\Admin\GiftCardUsageResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GiftCardUsageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gift_card_usage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GiftCardUsageResource(GiftCardUsage::with(['giftcard', 'customer'])->get());
    }

    public function store(StoreGiftCardUsageRequest $request)
    {
        $giftCardUsage = GiftCardUsage::create($request->all());

        return (new GiftCardUsageResource($giftCardUsage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GiftCardUsage $giftCardUsage)
    {
        abort_if(Gate::denies('gift_card_usage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GiftCardUsageResource($giftCardUsage->load(['giftcard', 'customer']));
    }

    public function update(UpdateGiftCardUsageRequest $request, GiftCardUsage $giftCardUsage)
    {
        $giftCardUsage->update($request->all());

        return (new GiftCardUsageResource($giftCardUsage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GiftCardUsage $giftCardUsage)
    {
        abort_if(Gate::denies('gift_card_usage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftCardUsage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
