@extends('layouts.app')

@section('content')
    <h3 class="page-title">Income</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Income Category</th>
                            <td>{{ $income->income_category->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>Entry date</th>
                            <td>{{ $income->entry_date }}</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>{{ $income->amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('incomes.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop
