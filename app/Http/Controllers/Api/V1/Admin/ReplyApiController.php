<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Http\Resources\Admin\ReplyResource;
use App\Reply;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReplyResource(Reply::with(['ticket'])->get());
    }

    public function store(StoreReplyRequest $request)
    {
        $reply = Reply::create($request->all());

        return (new ReplyResource($reply))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Reply $reply)
    {
        abort_if(Gate::denies('reply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReplyResource($reply->load(['ticket']));
    }

    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        $reply->update($request->all());

        return (new ReplyResource($reply))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Reply $reply)
    {
        abort_if(Gate::denies('reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reply->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
