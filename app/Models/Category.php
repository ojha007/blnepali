<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(array $where)
 * @method static pluck(string $value, string $key)
 * @method static create(array $attributes)
 * @method static whereNull(string $string)
 * @method static select($column)
 * @method static count()
 * @property boolean $is_video
 */
class Category extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function childCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(CategoryPosition::class);
    }

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

}
