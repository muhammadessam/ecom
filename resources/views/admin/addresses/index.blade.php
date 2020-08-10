@extends('layouts.admin')
@section('content')
@can('address_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.addresses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.address.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.address.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Address">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.address.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.country') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.city') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.area') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.lat') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.long') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.details') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.alter_phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.block') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.gada') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.street') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.building') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.floor') }}
                    </th>
                    <th>
                        {{ trans('cruds.address.fields.flat_house') }}
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
@can('address_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.addresses.massDestroy') }}",
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
    ajax: "{{ route('admin.addresses.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'customer_name', name: 'customer.name' },
{ data: 'country_name', name: 'country.name' },
{ data: 'city_name', name: 'city.name' },
{ data: 'area_name', name: 'area.name' },
{ data: 'lat', name: 'lat' },
{ data: 'long', name: 'long' },
{ data: 'details', name: 'details' },
{ data: 'phone', name: 'phone' },
{ data: 'alter_phone', name: 'alter_phone' },
{ data: 'name', name: 'name' },
{ data: 'block', name: 'block' },
{ data: 'gada', name: 'gada' },
{ data: 'street', name: 'street' },
{ data: 'building', name: 'building' },
{ data: 'floor', name: 'floor' },
{ data: 'flat_house', name: 'flat_house' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Address').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection