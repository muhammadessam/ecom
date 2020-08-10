<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Coupon;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCartRequest;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Cart::with(['customer', 'coupon'])->select(sprintf('%s.*', (new Cart)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'cart_show';
                $editGate      = 'cart_edit';
                $deleteGate    = 'cart_delete';
                $crudRoutePart = 'carts';

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
            $table->addColumn('customer_name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });

            $table->addColumn('coupon_name', function ($row) {
                return $row->coupon ? $row->coupon->name : '';
            });

            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : "";
            });
            $table->editColumn('discount', function ($row) {
                return $row->discount ? $row->discount : "";
            });
            $table->editColumn('to_be_paid', function ($row) {
                return $row->to_be_paid ? $row->to_be_paid : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'customer', 'coupon']);

            return $table->make(true);
        }

        return view('admin.carts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupons = Coupon::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carts.create', compact('customers', 'coupons'));
    }

    public function store(StoreCartRequest $request)
    {
        $cart = Cart::create($request->all());

        return redirect()->route('admin.carts.index');
    }

    public function edit(Cart $cart)
    {
        abort_if(Gate::denies('cart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupons = Coupon::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cart->load('customer', 'coupon');

        return view('admin.carts.edit', compact('customers', 'coupons', 'cart'));
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->all());

        return redirect()->route('admin.carts.index');
    }

    public function show(Cart $cart)
    {
        abort_if(Gate::denies('cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cart->load('customer', 'coupon');

        return view('admin.carts.show', compact('cart'));
    }

    public function destroy(Cart $cart)
    {
        abort_if(Gate::denies('cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cart->delete();

        return back();
    }

    public function massDestroy(MassDestroyCartRequest $request)
    {
        Cart::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
