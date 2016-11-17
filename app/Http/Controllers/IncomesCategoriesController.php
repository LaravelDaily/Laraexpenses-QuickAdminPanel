<?php

namespace App\Http\Controllers;

use App\IncomesCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIncomesCategoriesRequest;
use App\Http\Requests\UpdateIncomesCategoriesRequest;

class IncomesCategoriesController extends Controller
{

    /**
     * Display a listing of IncomesCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes_categories = IncomesCategory::all();

        return view('incomes_categories.index', compact('incomes_categories'));
    }

    /**
     * Show the form for creating new IncomesCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incomes_categories.create');
    }

    /**
     * Store a newly created IncomesCategory in storage.
     *
     * @param  \App\Http\Requests\StoreIncomesCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomesCategoriesRequest $request)
    {
        IncomesCategory::create($request->all());

        return redirect()->route('incomes_categories.index');
    }

    /**
     * Show the form for editing IncomesCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incomes_category = IncomesCategory::findOrFail($id);

        return view('incomes_categories.edit', compact('incomes_category'));
    }

    /**
     * Update IncomesCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomesCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomesCategoriesRequest $request, $id)
    {
        $incomes_category = IncomesCategory::findOrFail($id);
        $incomes_category->update($request->all());

        return redirect()->route('incomes_categories.index');
    }

    /**
     * Display IncomesCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incomes_category = IncomesCategory::findOrFail($id);

        return view('incomes_categories.show', compact('incomes_category'));
    }

    /**
     * Remove IncomesCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incomes_category = IncomesCategory::findOrFail($id);
        $incomes_category->delete();

        return redirect()->route('incomes_categories.index');
    }

    /**
     * Delete all selected IncomesCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = IncomesCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
