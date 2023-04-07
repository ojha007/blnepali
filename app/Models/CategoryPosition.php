<?php

namespace App\Models;

use Database\Factories\CategoryPositionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\CategoryPosition
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $front_header_position
 * @property int|null $detail_header_position
 * @property int|null $front_body_position
 * @property int|null $detail_body_position
 * @property-read Category $category
 * @method static CategoryPositionFactory factory(...$parameters)
 * @method static Builder|CategoryPosition headerPosition()
 * @method static Builder|CategoryPosition bodyPosition()
 * @method static Builder|CategoryPosition frontPagePosition()
 * @method static Builder|CategoryPosition newModelQuery()
 * @method static Builder|CategoryPosition newQuery()
 * @method static Builder|CategoryPosition query()
 * @method static Builder|CategoryPosition whereCategoryId($value)
 * @method static Builder|CategoryPosition whereDetailBodyPosition($value)
 * @method static Builder|CategoryPosition whereDetailHeaderPosition($value)
 * @method static Builder|CategoryPosition whereFrontBodyPosition($value)
 * @method static Builder|CategoryPosition whereFrontHeaderPosition($value)
 * @method static Builder|CategoryPosition whereId($value)
 * @mixin \Eloquent
 */
class CategoryPosition extends Model
{
    use HasFactory;

    protected $table = 'category_positions';

    public $timestamps = false;

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeHeaderPosition(Builder $builder)
    {
        $builder->whereNotNull('front_header_position');
    }

    public function scopeBodyPosition(Builder $builder)
    {
        $builder->whereNotNull('front_body_position');
    }

    public function scopeFrontPagePosition(Builder $builder)
    {
        $builder->whereNotNull('front_header_position')
            ->orWhereNotNull('front_body_position');
    }
}
