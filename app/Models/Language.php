<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

/**
 * Class Language
 * @property  integer $id
 * @property  string $name
 * @property  string $alias
 *
 * @package App\Models
 * @mixin Eloquent
 *
 */
class Language extends Model
{
    public $timestamps = false;

    public function cards()
    {
        return $this->hasMany('App\Models\Card');
    }
}
