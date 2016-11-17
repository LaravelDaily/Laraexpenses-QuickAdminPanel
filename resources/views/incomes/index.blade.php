@extends('layouts.app')

@section('content')
    <h3 class="page-title">Income</h3>

    <p>
        <a href="{{ route('incomes.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($incomes) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Income Category</th>
                        <th>Entry date</th>
                        <th>Amount</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($incomes) > 0)
                        @foreach ($incomes as $income)
                            <tr data-entry-id="{{ $income->id }}">
                                <td></td>
                                <td>{{ $income->income_category->name or '' }}</td>
                                <td>{{ $income->entry_date }}</td>
                                <td>{{ $income->amount }}</td>
                                <td>
                                    <a href="{{ route('incomes.show',[$income->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('incomes.edit',[$income->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['incomes.destroy', $income->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('incomes.mass_destroy') }}';
    </script>
@endsection
