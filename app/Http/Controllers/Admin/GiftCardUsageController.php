<?php

namespace App\Http\Controllers\Admin;

use App\CiftCard;
use App\Customer;
use App\GiftCardUsage;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGiftCardUsageRequest;
use App\Http\Requests\StoreGiftCardUsageRequest;
use App\Http\Requests\UpdateGiftCardUsageRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GiftCardUsageController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('gift_card_usage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GiftCardUsage::with(['giftcard', 'customer'])->select(sprintf('%s.*', (new GiftCardUsage)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'gift_card_usage_show';
                $editGate      = 'gift_card_usage_edit';
                $deleteGate    = 'gift_card_usage_delete';
                $crudRoutePart = 'gift-card-usages';

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
            $table->addColumn('giftcard_code', function ($row) {
                return $row->giftcard ? $row->giftcard->code : '';
            });

            $table->editColumn('giftcard.amount', function ($row) {
                return $row->giftcard ? (is_string($row->giftcard) ? $row->giftcard : $row->giftcard->amount) : '';
            });
            $table->addColumn('customer_name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'giftcard', 'customer']);

            return $table->make(true);
        }

        return view('admin.giftCardUsages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gift_card_usage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftcards = CiftCard::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.giftCardUsages.create', compact('giftcards', 'customers'));
    }

    public function store(StoreGiftCardUsageRequest $request)
    {
        $giftCardUsage = GiftCardUsage::create($request->all());

        return redirect()->route('admin.gift-card-usages.index');
    }

    public function edit(GiftCardUsage $giftCardUsage)
    {
        abort_if(Gate::denies('gift_card_usage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftcards = CiftCard::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $giftCardUsage->load('giftcard', 'customer');

        return view('admin.giftCardUsages.edit', compact('giftcards', 'customers', 'giftCardUsage'));
    }

    public function update(UpdateGiftCardUsageRequest $request, GiftCardUsage $giftCardUsage)
    {
        $giftCardUsage->update($request->all());

        return redirect()->route('admin.gift-card-usages.index');
    }

    public function show(GiftCardUsage $giftCardUsage)
    {
        abort_if(Gate::denies('gift_card_usage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftCardUsage->load('giftcard', 'customer');

        return view('admin.giftCardUsages.show', compact('giftCardUsage'));
    }

    public function destroy(GiftCardUsage $giftCardUsage)
    {
        abort_if(Gate::denies('gift_card_usage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $giftCardUsage->delete();

        return back();
    }

    public function massDestroy(MassDestroyGiftCardUsageRequest $request)
    {
        GiftCardUsage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
