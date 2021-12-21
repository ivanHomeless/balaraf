<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

/**
 * Class Page
 * @property  integer $id
 * @property  integer $slug
 * @property  string $title
 * @property  string $content
 * @property  string $seo_title
 * @property  string $seo_description
 * @property  string $seo_keywords
 * @property  integer $created_at
 * @property  integer $updated_at
 *
 * @package App\Models
 * @mixin Eloquent
 *
 */
class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'content',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];
}
