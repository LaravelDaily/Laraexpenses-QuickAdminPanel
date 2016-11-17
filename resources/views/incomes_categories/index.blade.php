@extends('layouts.app')

@section('content')
    <h3 class="page-title">Income Categories</h3>

    <p>
        <a href="{{ route('incomes_categories.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($incomes_categories) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($incomes_categories) > 0)
                        @foreach ($incomes_categories as $incomes_category)
                            <tr data-entry-id="{{ $incomes_category->id }}">
                                <td></td>
                                <td>{{ $incomes_category->name }}</td>
                                <td>
                                    <a href="{{ route('incomes_categories.show',[$incomes_category->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('incomes_categories.edit',[$incomes_category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['incomes_categories.destroy', $incomes_category->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('incomes_categories.mass_destroy') }}';
    </script>
@endsection
