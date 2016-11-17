@extends('layouts.app')

@section('content')
    <h3 class="page-title">Expenses Categories</h3>

    <p>
        <a href="{{ route('expenses_categories.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($expenses_categories) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($expenses_categories) > 0)
                        @foreach ($expenses_categories as $expenses_category)
                            <tr data-entry-id="{{ $expenses_category->id }}">
                                <td></td>
                                <td>{{ $expenses_category->name }}</td>
                                <td>
                                    <a href="{{ route('expenses_categories.show',[$expenses_category->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('expenses_categories.edit',[$expenses_category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['expenses_categories.destroy', $expenses_category->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('expenses_categories.mass_destroy') }}';
    </script>
@endsection
