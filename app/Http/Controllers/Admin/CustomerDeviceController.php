<?php

namespace App\Http\Controllers\Admin;

use App\CustomerDevice;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerDeviceRequest;
use App\Http\Requests\StoreCustomerDeviceRequest;
use App\Http\Requests\UpdateCustomerDeviceRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CustomerDeviceController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('customer_device_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CustomerDevice::query()->select(sprintf('%s.*', (new CustomerDevice)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'customer_device_show';
                $editGate      = 'customer_device_edit';
                $deleteGate    = 'customer_device_delete';
                $crudRoutePart = 'customer-devices';

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
            $table->editColumn('type', function ($row) {
                return $row->type ? CustomerDevice::TYPE_RADIO[$row->type] : '';
            });
            $table->editColumn('token', function ($row) {
                return $row->token ? $row->token : "";
            });
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.customerDevices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('customer_device_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDevices.create');
    }

    public function store(StoreCustomerDeviceRequest $request)
    {
        $customerDevice = CustomerDevice::create($request->all());

        return redirect()->route('admin.customer-devices.index');
    }

    public function edit(CustomerDevice $customerDevice)
    {
        abort_if(Gate::denies('customer_device_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDevices.edit', compact('customerDevice'));
    }

    public function update(UpdateCustomerDeviceRequest $request, CustomerDevice $customerDevice)
    {
        $customerDevice->update($request->all());

        return redirect()->route('admin.customer-devices.index');
    }

    public function show(CustomerDevice $customerDevice)
    {
        abort_if(Gate::denies('customer_device_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDevices.show', compact('customerDevice'));
    }

    public function destroy(CustomerDevice $customerDevice)
    {
        abort_if(Gate::denies('customer_device_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDevice->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerDeviceRequest $request)
    {
        CustomerDevice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
