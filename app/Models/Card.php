<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

/**
 * Class Card
 * @property  integer $id
 * @property  integer $language_id
 * @property  string $letter
 * @property  string $word
 * @property  string $translation
 * @property  string $img_front
 * @property  string $img_back
 * @property  string $video
 * @property  string $sound
 * @property  integer $created_at
 * @property  integer $updated_at
 *
 * @property  Language $language
 * @package App\Models
 * @mixin Eloquent
 *
 */

class Card extends Model
{
    protected $fillable = [
        'letter',
        'word',
        'translation',
        'img_front',
        'img_back',
        'video',
        'sound',
        'language_id',
    ];

    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }
}
