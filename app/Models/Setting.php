<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @property  integer $id
 * @property  integer $name
 * @property  integer $value
 *
 * @package App\Models
 * @mixin Eloquent
 *
 */
class Setting extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'value',
    ];
}
