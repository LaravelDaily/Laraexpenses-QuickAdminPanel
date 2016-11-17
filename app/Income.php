<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Income
 *
 * @package App
 * @property string $income_category
 * @property string $entry_date
 * @property decimal $amount
*/
class Income extends Model
{
    use SoftDeletes;

    protected $fillable = ['entry_date', 'amount', 'income_category_id'];

    public static function boot()
    {
        parent::boot();

        Income::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setIncomeCategoryIdAttribute($input)
    {
        $this->attributes['income_category_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEntryDateAttribute($input)
    {
        if ($input != null) {
            $this->attributes['entry_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['entry_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEntryDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function income_category()
    {
        return $this->belongsTo(IncomesCategory::class, 'income_category_id')->withTrashed();
    }
}
