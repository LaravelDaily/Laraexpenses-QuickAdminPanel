@extends('layouts.app')

@section('content')
    <h3 class="page-title">Expenses</h3>

    <p>
        <a href="{{ route('expenses.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($expenses) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Expense Category</th>
                        <th>Entry date</th>
                        <th>Amount</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($expenses) > 0)
                        @foreach ($expenses as $expense)
                            <tr data-entry-id="{{ $expense->id }}">
                                <td></td>
                                <td>{{ $expense->expenses_category->name or '' }}</td>
                                <td>{{ $expense->entry_date }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td>
                                    <a href="{{ route('expenses.show',[$expense->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('expenses.edit',[$expense->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['expenses.destroy', $expense->id])) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('expenses.mass_destroy') }}';
    </script>
@endsection
