@extends('layouts.admin')
@section('content')
@can('transaction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transactions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transaction.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Transaction">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.order') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.payment_method') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.result') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.postdate') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.tranid') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.auth') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.ref') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.trackid') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.udf_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.udf_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.udf_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.udf_4') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.udf_5') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transaction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transactions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.transactions.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'type', name: 'type' },
{ data: 'amount', name: 'amount' },
{ data: 'order_serial', name: 'order.serial' },
{ data: 'payment_method_name', name: 'payment_method.name' },
{ data: 'result', name: 'result' },
{ data: 'postdate', name: 'postdate' },
{ data: 'tranid', name: 'tranid' },
{ data: 'auth', name: 'auth' },
{ data: 'ref', name: 'ref' },
{ data: 'trackid', name: 'trackid' },
{ data: 'udf_1', name: 'udf_1' },
{ data: 'udf_2', name: 'udf_2' },
{ data: 'udf_3', name: 'udf_3' },
{ data: 'udf_4', name: 'udf_4' },
{ data: 'udf_5', name: 'udf_5' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Transaction').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection