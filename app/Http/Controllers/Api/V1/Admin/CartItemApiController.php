<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CartItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Http\Resources\Admin\CartItemResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartItemApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cart_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CartItemResource(CartItem::with(['product'])->get());
    }

    public function store(StoreCartItemRequest $request)
    {
        $cartItem = CartItem::create($request->all());

        return (new CartItemResource($cartItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CartItemResource($cartItem->load(['product']));
    }

    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        $cartItem->update($request->all());

        return (new CartItemResource($cartItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CartItem $cartItem)
    {
        abort_if(Gate::denies('cart_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
