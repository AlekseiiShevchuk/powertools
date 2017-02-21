@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.view-fields.title')</h3>
    @can('view_field_create')
    <p>
        <a href="{{ route('view_fields.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($view_fields) > 0 ? 'datatable' : '' }} @can('view_field_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('view_field_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.view-fields.fields.name')</th>
                        <th>@lang('quickadmin.view-fields.fields.description')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($view_fields) > 0)
                        @foreach ($view_fields as $view_field)
                            <tr data-entry-id="{{ $view_field->id }}">
                                @can('view_field_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $view_field->name }}</td>
                                <td>{{ $view_field->description }}</td>
                                <td>
                                    @can('view_field_view')
                                    <a href="{{ route('view_fields.show',[$view_field->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('view_field_edit')
                                    <a href="{{ route('view_fields.edit',[$view_field->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('view_field_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['view_fields.destroy', $view_field->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('view_field_delete')
            window.route_mass_crud_entries_destroy = '{{ route('view_fields.mass_destroy') }}';
        @endcan

    </script>
@endsection