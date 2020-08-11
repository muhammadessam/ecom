<?php

namespace App\Http\Controllers\Admin;

use App\CiftCard;
use App\GiftsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCiftCardRequest;
use App\Http\Requests\StoreCiftCardRequest;
use App\Http\Requests\UpdateCiftCardRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class GiftCardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cift_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciftCards = CiftCard::all();

        return view('admin.ciftCards.index', compact('ciftCards'));
    }

    public function create()
    {
        abort_if(Gate::denies('cift_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = GiftsCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ciftCards.create', compact('categories'));
    }

    public function store(StoreCiftCardRequest $request)
    {
        $ciftCard = CiftCard::create($request->all());

        return redirect()->route('admin.gift-cards.index');
    }

    public function edit(CiftCard $giftCard)
    {
        abort_if(Gate::denies('cift_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = GiftsCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $giftCard->load('category');

        return view('admin.ciftCards.edit', compact('categories', 'giftCard'));
    }

    public function update(UpdateCiftCardRequest $request, CiftCard $giftCard)
    {
        $giftCard->update($request->all());

        return redirect()->route('admin.gift-cards.index');
    }

    public function show(CiftCard $giftCard)
    {
        abort_if(Gate::denies('cift_card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftCard->load('category');

        return view('admin.ciftCards.show', compact('giftCard'));
    }

    public function destroy(CiftCard $giftCard)
    {
        abort_if(Gate::denies('cift_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftCard->delete();

        return back();
    }

    public function massDestroy(MassDestroyCiftCardRequest $request)
    {
        CiftCard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
