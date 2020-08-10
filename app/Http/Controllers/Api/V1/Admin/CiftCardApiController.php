<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CiftCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCiftCardRequest;
use App\Http\Requests\UpdateCiftCardRequest;
use App\Http\Resources\Admin\CiftCardResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CiftCardApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cift_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CiftCardResource(CiftCard::with(['category'])->get());
    }

    public function store(StoreCiftCardRequest $request)
    {
        $ciftCard = CiftCard::create($request->all());

        return (new CiftCardResource($ciftCard))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CiftCard $ciftCard)
    {
        abort_if(Gate::denies('cift_card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CiftCardResource($ciftCard->load(['category']));
    }

    public function update(UpdateCiftCardRequest $request, CiftCard $ciftCard)
    {
        $ciftCard->update($request->all());

        return (new CiftCardResource($ciftCard))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CiftCard $ciftCard)
    {
        abort_if(Gate::denies('cift_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciftCard->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
