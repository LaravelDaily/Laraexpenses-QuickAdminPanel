<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIncomesRequest;
use App\Http\Requests\UpdateIncomesRequest;

class IncomesController extends Controller
{

    /**
     * Display a listing of Income.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::all();

        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating new Income.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'income_categories' => \App\IncomesCategory::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('incomes.create', $relations);
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param  \App\Http\Requests\StoreIncomesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomesRequest $request)
    {
        Income::create($request->all());

        return redirect()->route('incomes.index');
    }

    /**
     * Show the form for editing Income.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'income_categories' => \App\IncomesCategory::get()->pluck('name', 'id')->prepend('Please select', ''),

        ];

        $income = Income::findOrFail($id);

        return view('incomes.edit', compact('income') + $relations);
    }

    /**
     * Update Income in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomesRequest $request, $id)
    {
        $income = Income::findOrFail($id);
        $income->update($request->all());

        return redirect()->route('incomes.index');
    }

    /**
     * Display Income.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'income_categories' => \App\IncomesCategory::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $income = Income::findOrFail($id);

        return view('incomes.show', compact('income') + $relations);
    }

    /**
     * Remove Income from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();

        return redirect()->route('incomes.index');
    }

    /**
     * Delete all selected Income at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Income::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
