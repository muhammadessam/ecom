<?php

namespace App\Http\Controllers\Admin;

use App\CartItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCartItemRequest;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CartItemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cart_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CartItem::with(['product'])->select(sprintf('%s.*', (new CartItem)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'cart_item_show';
                $editGate      = 'cart_item_edit';
                $deleteGate    = 'cart_item_delete';
                $crudRoutePart = 'cart-items';

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
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('count', function ($row) {
                return $row->count ? $row->count : "";
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        return view('admin.cartItems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cart_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cartItems.create', compact('products'));
    }

    public function store(StoreCartItemRequest $request)
    {
        $cartItem = CartItem::create($request->all());

        return redirect()->route('admin.cart-items.index');
    }

    public function edit(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cartItem->load('product');

        return view('admin.cartItems.edit', compact('products', 'cartItem'));
    }

    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        $cartItem->update($request->all());

        return redirect()->route('admin.cart-items.index');
    }

    public function show(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartItem->load('product');

        return view('admin.cartItems.show', compact('cartItem'));
    }

    public function destroy(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyCartItemRequest $request)
    {
        CartItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
