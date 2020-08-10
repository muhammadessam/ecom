<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CustomerDevice;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerDeviceRequest;
use App\Http\Requests\UpdateCustomerDeviceRequest;
use App\Http\Resources\Admin\CustomerDeviceResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerDeviceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_device_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerDeviceResource(CustomerDevice::all());
    }

    public function store(StoreCustomerDeviceRequest $request)
    {
        $customerDevice = CustomerDevice::create($request->all());

        return (new CustomerDeviceResource($customerDevice))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerDevice $customerDevice)
    {
        abort_if(Gate::denies('customer_device_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerDeviceResource($customerDevice);
    }

    public function update(UpdateCustomerDeviceRequest $request, CustomerDevice $customerDevice)
    {
        $customerDevice->update($request->all());

        return (new CustomerDeviceResource($customerDevice))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerDevice $customerDevice)
    {
        abort_if(Gate::denies('customer_device_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDevice->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
