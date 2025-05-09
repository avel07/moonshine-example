<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsSection extends Model
{
    use NodeTrait;

    protected $fillable = [
        'title',
        'code',
        'active',
        'parent_id',
        'sort',
        'preview_picture',
        'detail_picture',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
