<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Order;
use App\OrderStatus;
use App\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Order::with(['adress', 'customer', 'status', 'vendors'])->select(sprintf('%s.*', (new Order)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'order_show';
                $editGate      = 'order_edit';
                $deleteGate    = 'order_delete';
                $crudRoutePart = 'orders';

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
            $table->addColumn('adress_details', function ($row) {
                return $row->adress ? $row->adress->details : '';
            });

            $table->addColumn('customer_name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });

            $table->addColumn('status_status', function ($row) {
                return $row->status ? $row->status->status : '';
            });

            $table->editColumn('vendor', function ($row) {
                $labels = [];

                foreach ($row->vendors as $vendor) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $vendor->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('shipping_frees', function ($row) {
                return $row->shipping_frees ? $row->shipping_frees : "";
            });

            $table->editColumn('total_price', function ($row) {
                return $row->total_price ? $row->total_price : "";
            });
            $table->editColumn('discount', function ($row) {
                return $row->discount ? $row->discount : "";
            });
            $table->editColumn('to_be_paid', function ($row) {
                return $row->to_be_paid ? $row->to_be_paid : "";
            });
            $table->editColumn('serial', function ($row) {
                return $row->serial ? $row->serial : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'adress', 'customer', 'status', 'vendor']);

            return $table->make(true);
        }

        return view('admin.orders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adresses = Address::all()->pluck('details', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = OrderStatus::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendors = Vendor::all()->pluck('name', 'id');

        return view('admin.orders.create', compact('adresses', 'customers', 'statuses', 'vendors'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $order->vendors()->sync($request->input('vendors', []));

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adresses = Address::all()->pluck('details', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = OrderStatus::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendors = Vendor::all()->pluck('name', 'id');

        $order->load('adress', 'customer', 'status', 'vendors');

        return view('admin.orders.edit', compact('adresses', 'customers', 'statuses', 'vendors', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        $order->vendors()->sync($request->input('vendors', []));

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('adress', 'customer', 'status', 'vendors', 'orderTransactions');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
