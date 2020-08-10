<div class="m-3">
    @can('ticket_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tickets.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.ticket.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.ticket.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-customerTickets">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.message') }}
                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.read') }}
                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.customer') }}
                            </th>
                            <th>
                                {{ trans('cruds.ticket.fields.status') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $key => $ticket)
                            <tr data-entry-id="{{ $ticket->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $ticket->id ?? '' }}
                                </td>
                                <td>
                                    {{ $ticket->name ?? '' }}
                                </td>
                                <td>
                                    {{ $ticket->email ?? '' }}
                                </td>
                                <td>
                                    {{ $ticket->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $ticket->message ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $ticket->read ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $ticket->read ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $ticket->customer->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Ticket::STATUS_RADIO[$ticket->status] ?? '' }}
                                </td>
                                <td>
                                    @can('ticket_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.tickets.show', $ticket->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('ticket_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.tickets.edit', $ticket->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('ticket_delete')
                                        <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ticket_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tickets.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-customerTickets:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection