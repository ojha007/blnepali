<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(array $where)
 * @method static whereActive(string $column)
 * @method static whereNull(string $column)
 * @method static pluck(string $value, string $key)
 * @method static withCount(string $relations)
 * @method static create(array $attributes)
 * @method static count()
 */
class Reporter extends Model
{
    protected $table = 'reporters';

    protected $guarded = [];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
