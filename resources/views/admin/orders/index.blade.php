@extends('layouts.admin')
@section('content')
@can('order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Order">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.order.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.adress') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.vendor') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.shipping_frees') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.picked_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.delievered_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.total_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.discount') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.to_be_paid') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.serial') }}
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
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
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
    ajax: "{{ route('admin.orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'adress_details', name: 'adress.details' },
{ data: 'customer_name', name: 'customer.name' },
{ data: 'status_status', name: 'status.status' },
{ data: 'vendor', name: 'vendors.name' },
{ data: 'shipping_frees', name: 'shipping_frees' },
{ data: 'picked_at', name: 'picked_at' },
{ data: 'delievered_at', name: 'delievered_at' },
{ data: 'total_price', name: 'total_price' },
{ data: 'discount', name: 'discount' },
{ data: 'to_be_paid', name: 'to_be_paid' },
{ data: 'serial', name: 'serial' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection