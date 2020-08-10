<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductAttributeValueRequest;
use App\Http\Requests\UpdateProductAttributeValueRequest;
use App\Http\Resources\Admin\ProductAttributeValueResource;
use App\ProductAttributeValue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAttributeValueApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_attribute_value_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductAttributeValueResource(ProductAttributeValue::with(['attribute'])->get());
    }

    public function store(StoreProductAttributeValueRequest $request)
    {
        $productAttributeValue = ProductAttributeValue::create($request->all());

        return (new ProductAttributeValueResource($productAttributeValue))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductAttributeValue $productAttributeValue)
    {
        abort_if(Gate::denies('product_attribute_value_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductAttributeValueResource($productAttributeValue->load(['attribute']));
    }

    public function update(UpdateProductAttributeValueRequest $request, ProductAttributeValue $productAttributeValue)
    {
        $productAttributeValue->update($request->all());

        return (new ProductAttributeValueResource($productAttributeValue))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductAttributeValue $productAttributeValue)
    {
        abort_if(Gate::denies('product_attribute_value_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productAttributeValue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
