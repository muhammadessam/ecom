<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Order;
use App\PaymentMethod;
use App\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Transaction::with(['order', 'payment_method'])->select(sprintf('%s.*', (new Transaction)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'transaction_show';
                $editGate      = 'transaction_edit';
                $deleteGate    = 'transaction_delete';
                $crudRoutePart = 'transactions';

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
                return $row->type ? Transaction::TYPE_RADIO[$row->type] : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });
            $table->addColumn('order_serial', function ($row) {
                return $row->order ? $row->order->serial : '';
            });

            $table->addColumn('payment_method_name', function ($row) {
                return $row->payment_method ? $row->payment_method->name : '';
            });

            $table->editColumn('result', function ($row) {
                return $row->result ? $row->result : "";
            });
            $table->editColumn('postdate', function ($row) {
                return $row->postdate ? $row->postdate : "";
            });
            $table->editColumn('tranid', function ($row) {
                return $row->tranid ? $row->tranid : "";
            });
            $table->editColumn('auth', function ($row) {
                return $row->auth ? $row->auth : "";
            });
            $table->editColumn('ref', function ($row) {
                return $row->ref ? $row->ref : "";
            });
            $table->editColumn('trackid', function ($row) {
                return $row->trackid ? $row->trackid : "";
            });
            $table->editColumn('udf_1', function ($row) {
                return $row->udf_1 ? $row->udf_1 : "";
            });
            $table->editColumn('udf_2', function ($row) {
                return $row->udf_2 ? $row->udf_2 : "";
            });
            $table->editColumn('udf_3', function ($row) {
                return $row->udf_3 ? $row->udf_3 : "";
            });
            $table->editColumn('udf_4', function ($row) {
                return $row->udf_4 ? $row->udf_4 : "";
            });
            $table->editColumn('udf_5', function ($row) {
                return $row->udf_5 ? $row->udf_5 : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'order', 'payment_method']);

            return $table->make(true);
        }

        return view('admin.transactions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::all()->pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transactions.create', compact('orders', 'payment_methods'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::all()->pluck('serial', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('order', 'payment_method');

        return view('admin.transactions.edit', compact('orders', 'payment_methods', 'transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('order', 'payment_method');

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
