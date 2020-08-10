@extends('layouts.admin')
@section('content')
@can('vendor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vendors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vendor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vendor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Vendor">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.img') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.is_active') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.commision_annual_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.renew_commision_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.commision_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.is_knet_supported') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.is_cc_supported') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.cover_img') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.minimum_charge') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.website') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.facebook') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.twitter') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.instagram') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.linkedin') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.youtube') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.pinterest') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.openning') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.closing') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.phone_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.phone_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.vendor.fields.phone_3') }}
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
@can('vendor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vendors.massDestroy') }}",
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
    ajax: "{{ route('admin.vendors.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'img', name: 'img', sortable: false, searchable: false },
{ data: 'is_active', name: 'is_active' },
{ data: 'commision_annual_price', name: 'commision_annual_price' },
{ data: 'renew_commision_date', name: 'renew_commision_date' },
{ data: 'commision_type', name: 'commision_type' },
{ data: 'is_knet_supported', name: 'is_knet_supported' },
{ data: 'is_cc_supported', name: 'is_cc_supported' },
{ data: 'cover_img', name: 'cover_img', sortable: false, searchable: false },
{ data: 'minimum_charge', name: 'minimum_charge' },
{ data: 'website', name: 'website' },
{ data: 'facebook', name: 'facebook' },
{ data: 'twitter', name: 'twitter' },
{ data: 'instagram', name: 'instagram' },
{ data: 'linkedin', name: 'linkedin' },
{ data: 'youtube', name: 'youtube' },
{ data: 'pinterest', name: 'pinterest' },
{ data: 'openning', name: 'openning' },
{ data: 'closing', name: 'closing' },
{ data: 'phone_1', name: 'phone_1' },
{ data: 'phone_2', name: 'phone_2' },
{ data: 'phone_3', name: 'phone_3' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Vendor').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection