<?php
namespace App\Http\Controllers;

use App\Income;
use App\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonthlyReportsController extends Controller
{
    public function index(Request $r)
    {
        $from    = Carbon::parse(sprintf(
            '%s-%s-01',
            $r->query('y', Carbon::now()->year),
            $r->query('m', Carbon::now()->month)
        ));
        $to      = clone $from;
        $to->day = $to->daysInMonth;

        $exp_q = Expense::with('expenses_category')
            ->whereBetween('entry_date', [$from, $to]);

        $inc_q = Income::with('income_category')
            ->whereBetween('entry_date', [$from, $to]);

        $exp_group = $exp_q->orderBy('amount', 'desc')->get()->groupBy('expenses_category_id');
        $inc_group = $inc_q->orderBy('amount', 'desc')->get()->groupBy('income_category_id');
        $exp_total = $exp_q->sum('amount');
        $inc_total = $inc_q->sum('amount');
        $profit    = $inc_total - $exp_total;

        $exp_summary = [];
        foreach ($exp_group as $exp) {
            foreach ($exp as $line) {
                if (!isset($exp_summary[$line->expenses_category->name])) {
                    $exp_summary[$line->expenses_category->name] = [
                        'name'   => $line->expenses_category->name,
                        'amount' => 0,
                    ];
                }
                $exp_summary[$line->expenses_category->name]['amount'] += $line->amount;
            }
        }

        $inc_summary = [];
        foreach ($inc_group as $inc) {
            foreach ($inc as $line) {
                if (!isset($inc_summary[$line->income_category->name])) {
                    $inc_summary[$line->income_category->name] = [
                        'name'   => $line->income_category->name,
                        'amount' => 0,
                    ];
                }
                $inc_summary[$line->income_category->name]['amount'] += $line->amount;
            }
        }

        return view('monthly_reports.index', compact(
            'exp_summary',
            'inc_summary',
            'exp_total',
            'inc_total',
            'profit'
        ));
    }
}
