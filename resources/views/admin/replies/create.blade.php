@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reply.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.replies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="ticket_id">{{ trans('cruds.reply.fields.ticket') }}</label>
                <select class="form-control select2 {{ $errors->has('ticket') ? 'is-invalid' : '' }}" name="ticket_id" id="ticket_id" required>
                    @foreach($tickets as $id => $ticket)
                        <option value="{{ $id }}" {{ old('ticket_id') == $id ? 'selected' : '' }}>{{ $ticket }}</option>
                    @endforeach
                </select>
                @if($errors->has('ticket'))
                    <span class="text-danger">{{ $errors->first('ticket') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reply.fields.ticket_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reply">{{ trans('cruds.reply.fields.reply') }}</label>
                <textarea class="form-control {{ $errors->has('reply') ? 'is-invalid' : '' }}" name="reply" id="reply" required>{{ old('reply') }}</textarea>
                @if($errors->has('reply'))
                    <span class="text-danger">{{ $errors->first('reply') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reply.fields.reply_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection