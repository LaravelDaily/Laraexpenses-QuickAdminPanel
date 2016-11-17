<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IncomesCategory
 *
 * @package App
 * @property string $name
*/
class IncomesCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();

        IncomesCategory::observe(new \App\Observers\UserActionsObserver);
    }
}
