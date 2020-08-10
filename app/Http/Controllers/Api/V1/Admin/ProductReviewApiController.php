<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Http\Resources\Admin\ProductReviewResource;
use App\ProductReview;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductReviewApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductReviewResource(ProductReview::with(['product'])->get());
    }

    public function store(StoreProductReviewRequest $request)
    {
        $productReview = ProductReview::create($request->all());

        return (new ProductReviewResource($productReview))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductReviewResource($productReview->load(['product']));
    }

    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        $productReview->update($request->all());

        return (new ProductReviewResource($productReview))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReview->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
