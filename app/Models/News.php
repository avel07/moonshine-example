<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $fillable = [
        'title',
        'body',
        'news_section_id',
    ];

    /**
     * Раздел, к которому принадлежит новость
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(NewsSection::class, 'news_section_id')->withDefault();
    }
}
