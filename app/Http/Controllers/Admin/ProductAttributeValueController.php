<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductAttributeValueRequest;
use App\Http\Requests\StoreProductAttributeValueRequest;
use App\Http\Requests\UpdateProductAttributeValueRequest;
use App\ProductAttribute;
use App\ProductAttributeValue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductAttributeValueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_attribute_value_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productAttributeValues = ProductAttributeValue::all();

        return view('admin.productAttributeValues.index', compact('productAttributeValues'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_attribute_value_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributes = ProductAttribute::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productAttributeValues.create', compact('attributes'));
    }

    public function store(StoreProductAttributeValueRequest $request)
    {
        $productAttributeValue = ProductAttributeValue::create($request->all());

        return redirect()->route('admin.product-attribute-values.index');
    }

    public function edit(ProductAttributeValue $productAttributeValue)
    {
        abort_if(Gate::denies('product_attribute_value_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributes = ProductAttribute::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productAttributeValue->load('attribute');

        return view('admin.productAttributeValues.edit', compact('attributes', 'productAttributeValue'));
    }

    public function update(UpdateProductAttributeValueRequest $request, ProductAttributeValue $productAttributeValue)
    {
        $productAttributeValue->update($request->all());

        return redirect()->route('admin.product-attribute-values.index');
    }

    public function show(ProductAttributeValue $productAttributeValue)
    {
        abort_if(Gate::denies('product_attribute_value_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productAttributeValue->load('attribute');

        return view('admin.productAttributeValues.show', compact('productAttributeValue'));
    }

    public function destroy(ProductAttributeValue $productAttributeValue)
    {
        abort_if(Gate::denies('product_attribute_value_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productAttributeValue->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductAttributeValueRequest $request)
    {
        ProductAttributeValue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
