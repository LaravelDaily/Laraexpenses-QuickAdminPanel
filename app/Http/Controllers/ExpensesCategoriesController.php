<?php

namespace App\Http\Controllers;

use App\ExpensesCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpensesCategoriesRequest;
use App\Http\Requests\UpdateExpensesCategoriesRequest;

class ExpensesCategoriesController extends Controller
{

    /**
     * Display a listing of ExpensesCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses_categories = ExpensesCategory::all();

        return view('expenses_categories.index', compact('expenses_categories'));
    }

    /**
     * Show the form for creating new ExpensesCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses_categories.create');
    }

    /**
     * Store a newly created ExpensesCategory in storage.
     *
     * @param  \App\Http\Requests\StoreExpensesCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpensesCategoriesRequest $request)
    {
        ExpensesCategory::create($request->all());

        return redirect()->route('expenses_categories.index');
    }

    /**
     * Show the form for editing ExpensesCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expenses_category = ExpensesCategory::findOrFail($id);

        return view('expenses_categories.edit', compact('expenses_category'));
    }

    /**
     * Update ExpensesCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateExpensesCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpensesCategoriesRequest $request, $id)
    {
        $expenses_category = ExpensesCategory::findOrFail($id);
        $expenses_category->update($request->all());

        return redirect()->route('expenses_categories.index');
    }

    /**
     * Display ExpensesCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expenses_category = ExpensesCategory::findOrFail($id);

        return view('expenses_categories.show', compact('expenses_category'));
    }

    /**
     * Remove ExpensesCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenses_category = ExpensesCategory::findOrFail($id);
        $expenses_category->delete();

        return redirect()->route('expenses_categories.index');
    }

    /**
     * Delete all selected ExpensesCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = ExpensesCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
