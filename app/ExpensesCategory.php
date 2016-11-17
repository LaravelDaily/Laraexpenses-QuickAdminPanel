<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpensesCategory
 *
 * @package App
 * @property string $name
*/
class ExpensesCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();

        ExpensesCategory::observe(new \App\Observers\UserActionsObserver);
    }
}
