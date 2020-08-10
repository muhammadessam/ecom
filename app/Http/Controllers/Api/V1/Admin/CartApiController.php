<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\Admin\CartResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CartResource(Cart::with(['customer', 'coupon'])->get());
    }

    public function store(StoreCartRequest $request)
    {
        $cart = Cart::create($request->all());

        return (new CartResource($cart))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cart $cart)
    {
        abort_if(Gate::denies('cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CartResource($cart->load(['customer', 'coupon']));
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->all());

        return (new CartResource($cart))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cart $cart)
    {
        abort_if(Gate::denies('cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cart->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
