<?php

namespace App\Http\Controllers\Admin;

use App\CiftCard;
use App\GiftsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCiftCardRequest;
use App\Http\Requests\StoreCiftCardRequest;
use App\Http\Requests\UpdateCiftCardRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CiftCardController extends Controller
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

        return redirect()->route('admin.cift-cards.index');
    }

    public function edit(CiftCard $ciftCard)
    {
        abort_if(Gate::denies('cift_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = GiftsCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ciftCard->load('category');

        return view('admin.ciftCards.edit', compact('categories', 'ciftCard'));
    }

    public function update(UpdateCiftCardRequest $request, CiftCard $ciftCard)
    {
        $ciftCard->update($request->all());

        return redirect()->route('admin.cift-cards.index');
    }

    public function show(CiftCard $ciftCard)
    {
        abort_if(Gate::denies('cift_card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciftCard->load('category');

        return view('admin.ciftCards.show', compact('ciftCard'));
    }

    public function destroy(CiftCard $ciftCard)
    {
        abort_if(Gate::denies('cift_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciftCard->delete();

        return back();
    }

    public function massDestroy(MassDestroyCiftCardRequest $request)
    {
        CiftCard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
