@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Product">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.product.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.sku') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.tag') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.videos') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.model') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.slug') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.price_after_discount') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.cost') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.discountable') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.inventory_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.availability') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.meta_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.meta_keywords') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.meta_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.vendor') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.brand') }}
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
@can('product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
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
    ajax: "{{ route('admin.products.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'sku', name: 'sku' },
{ data: 'name', name: 'name' },
{ data: 'price', name: 'price' },
{ data: 'category', name: 'categories.name' },
{ data: 'tag', name: 'tags.name' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'videos', name: 'videos', sortable: false, searchable: false },
{ data: 'model', name: 'model' },
{ data: 'slug', name: 'slug' },
{ data: 'price_after_discount', name: 'price_after_discount' },
{ data: 'cost', name: 'cost' },
{ data: 'discountable', name: 'discountable' },
{ data: 'inventory_number', name: 'inventory_number' },
{ data: 'availability', name: 'availability' },
{ data: 'status_status', name: 'status.status' },
{ data: 'meta_title', name: 'meta_title' },
{ data: 'meta_keywords', name: 'meta_keywords' },
{ data: 'meta_description', name: 'meta_description' },
{ data: 'vendor_name', name: 'vendor.name' },
{ data: 'brand_name', name: 'brand.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Product').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection