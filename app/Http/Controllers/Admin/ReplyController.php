<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReplyRequest;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Reply;
use App\Ticket;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReplyController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Reply::with(['ticket'])->select(sprintf('%s.*', (new Reply)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'reply_show';
                $editGate      = 'reply_edit';
                $deleteGate    = 'reply_delete';
                $crudRoutePart = 'replies';

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
            $table->addColumn('ticket_name', function ($row) {
                return $row->ticket ? $row->ticket->name : '';
            });

            $table->editColumn('reply', function ($row) {
                return $row->reply ? $row->reply : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'ticket']);

            return $table->make(true);
        }

        return view('admin.replies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tickets = Ticket::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.replies.create', compact('tickets'));
    }

    public function store(StoreReplyRequest $request)
    {
        $reply = Reply::create($request->all());

        return redirect()->route('admin.replies.index');
    }

    public function edit(Reply $reply)
    {
        abort_if(Gate::denies('reply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tickets = Ticket::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reply->load('ticket');

        return view('admin.replies.edit', compact('tickets', 'reply'));
    }

    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        $reply->update($request->all());

        return redirect()->route('admin.replies.index');
    }

    public function show(Reply $reply)
    {
        abort_if(Gate::denies('reply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reply->load('ticket');

        return view('admin.replies.show', compact('reply'));
    }

    public function destroy(Reply $reply)
    {
        abort_if(Gate::denies('reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reply->delete();

        return back();
    }

    public function massDestroy(MassDestroyReplyRequest $request)
    {
        Reply::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
