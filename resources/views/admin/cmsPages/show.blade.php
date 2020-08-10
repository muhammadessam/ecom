@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cmsPage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cms-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cmsPage.fields.id') }}
                        </th>
                        <td>
                            {{ $cmsPage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cmsPage.fields.question') }}
                        </th>
                        <td>
                            {{ $cmsPage->question }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cmsPage.fields.answer') }}
                        </th>
                        <td>
                            {{ $cmsPage->answer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cmsPage.fields.cat') }}
                        </th>
                        <td>
                            {{ $cmsPage->cat->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cms-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection