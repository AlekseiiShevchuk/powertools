<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ViewField
 *
 * @package App
 * @property string $name
 * @property string $description
*/
class ViewField extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];
    
    public static function boot()
    {
        parent::boot();

        ViewField::observe(new \App\Observers\UserActionsObserver);
    }
    
}
