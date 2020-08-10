@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cmsPage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cms-pages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="question">{{ trans('cruds.cmsPage.fields.question') }}</label>
                <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text" name="question" id="question" value="{{ old('question', '') }}">
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cmsPage.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="answer">{{ trans('cruds.cmsPage.fields.answer') }}</label>
                <input class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" type="text" name="answer" id="answer" value="{{ old('answer', '') }}">
                @if($errors->has('answer'))
                    <span class="text-danger">{{ $errors->first('answer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cmsPage.fields.answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cat_id">{{ trans('cruds.cmsPage.fields.cat') }}</label>
                <select class="form-control select2 {{ $errors->has('cat') ? 'is-invalid' : '' }}" name="cat_id" id="cat_id">
                    @foreach($cats as $id => $cat)
                        <option value="{{ $id }}" {{ old('cat_id') == $id ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
                @if($errors->has('cat'))
                    <span class="text-danger">{{ $errors->first('cat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.cmsPage.fields.cat_helper') }}</span>
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