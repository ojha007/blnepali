<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(array $where)
 * @method static pluck(string $value, string $key)
 * @method static create(array $attributes)
 * @method static whereNull(string $string)
 * @method static select(string $string, string $string1)
 * @method static count()
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

}
