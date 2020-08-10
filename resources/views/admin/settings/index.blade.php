@extends('layouts.admin')
@section('content')
@can('setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.setting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.setting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Setting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.store_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.store_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.e_mail') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.receive_order_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.telephone') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.close_order') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.ios_app_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.android_app_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.updateios') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.updateandroid') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.iosupdatever') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.androidupdatever') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.instagram') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.twitter') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.linkedin') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.pinterest') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.telegram') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.general_image_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.product_image_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.vendor_image_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.slide_image_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.product_video_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.category_image_path') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.start_opening_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.close_openning_time') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($settings as $key => $setting)
                        <tr data-entry-id="{{ $setting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $setting->id ?? '' }}
                            </td>
                            <td>
                                {{ $setting->store_name ?? '' }}
                            </td>
                            <td>
                                {{ $setting->store_title ?? '' }}
                            </td>
                            <td>
                                {{ $setting->description ?? '' }}
                            </td>
                            <td>
                                {{ $setting->address ?? '' }}
                            </td>
                            <td>
                                {{ $setting->e_mail ?? '' }}
                            </td>
                            <td>
                                {{ $setting->receive_order_email ?? '' }}
                            </td>
                            <td>
                                {{ $setting->telephone ?? '' }}
                            </td>
                            <td>
                                {{ $setting->mobile ?? '' }}
                            </td>
                            <td>
                                {{ App\Setting::CLOSE_ORDER_RADIO[$setting->close_order] ?? '' }}
                            </td>
                            <td>
                                @if($setting->logo)
                                    <a href="{{ $setting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $setting->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $setting->ios_app_link ?? '' }}
                            </td>
                            <td>
                                {{ $setting->android_app_link ?? '' }}
                            </td>
                            <td>
                                {{ App\Setting::UPDATEIOS_RADIO[$setting->updateios] ?? '' }}
                            </td>
                            <td>
                                {{ App\Setting::UPDATEANDROID_RADIO[$setting->updateandroid] ?? '' }}
                            </td>
                            <td>
                                {{ $setting->iosupdatever ?? '' }}
                            </td>
                            <td>
                                {{ $setting->androidupdatever ?? '' }}
                            </td>
                            <td>
                                {{ $setting->facebook ?? '' }}
                            </td>
                            <td>
                                {{ $setting->instagram ?? '' }}
                            </td>
                            <td>
                                {{ $setting->twitter ?? '' }}
                            </td>
                            <td>
                                {{ $setting->linkedin ?? '' }}
                            </td>
                            <td>
                                {{ $setting->pinterest ?? '' }}
                            </td>
                            <td>
                                {{ $setting->telegram ?? '' }}
                            </td>
                            <td>
                                {{ $setting->general_image_path ?? '' }}
                            </td>
                            <td>
                                {{ $setting->product_image_path ?? '' }}
                            </td>
                            <td>
                                {{ $setting->vendor_image_path ?? '' }}
                            </td>
                            <td>
                                {{ $setting->slide_image_path ?? '' }}
                            </td>
                            <td>
                                {{ $setting->product_video_path ?? '' }}
                            </td>
                            <td>
                                {{ $setting->category_image_path ?? '' }}
                            </td>
                            <td>
                                {{ $setting->start_opening_time ?? '' }}
                            </td>
                            <td>
                                {{ $setting->close_openning_time ?? '' }}
                            </td>
                            <td>
                                @can('setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.settings.show', $setting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.settings.edit', $setting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('setting_delete')
                                    <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.settings.massDestroy') }}",
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
  let table = $('.datatable-Setting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection