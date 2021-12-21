<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

/**
 * Class MenuItem
 * @property  integer $id
 * @property  string $title
 * @property  string $url
 *
 * @package App\Models
 * @mixin Eloquent
 *
 */

class MenuItem extends Model
{
    protected $fillable = [
        'title',
        'url',
    ];

    public $timestamps = false;
}
