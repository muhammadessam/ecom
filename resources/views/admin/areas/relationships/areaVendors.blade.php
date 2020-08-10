<div class="m-3">
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
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-areaVendors">
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
                                {{ trans('cruds.vendor.fields.area') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendors as $key => $vendor)
                            <tr data-entry-id="{{ $vendor->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $vendor->id ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->name ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->email ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->phone ?? '' }}
                                </td>
                                <td>
                                    @if($vendor->img)
                                        <a href="{{ $vendor->img->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $vendor->img->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <span style="display:none">{{ $vendor->is_active ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $vendor->is_active ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $vendor->commision_annual_price ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->renew_commision_date ?? '' }}
                                </td>
                                <td>
                                    {{ App\Vendor::COMMISION_TYPE_RADIO[$vendor->commision_type] ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $vendor->is_knet_supported ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $vendor->is_knet_supported ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <span style="display:none">{{ $vendor->is_cc_supported ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $vendor->is_cc_supported ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @if($vendor->cover_img)
                                        <a href="{{ $vendor->cover_img->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $vendor->cover_img->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $vendor->minimum_charge ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->website ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->facebook ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->twitter ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->instagram ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->linkedin ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->youtube ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->pinterest ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->openning ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->closing ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->phone_1 ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->phone_2 ?? '' }}
                                </td>
                                <td>
                                    {{ $vendor->phone_3 ?? '' }}
                                </td>
                                <td>
                                    @foreach($vendor->areas as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('vendor_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.vendors.show', $vendor->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('vendor_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.vendors.edit', $vendor->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('vendor_delete')
                                        <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('vendor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vendors.massDestroy') }}",
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
  let table = $('.datatable-areaVendors:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection