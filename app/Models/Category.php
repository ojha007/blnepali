<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $parent_id
 * @property int $is_active
 * @property int $in_mobile
 * @property int $is_video
 * @property int $new_design
 * @property string|null $image
 * @property string|null $image_description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Category> $childCategories
 * @property-read int|null $child_categories_count
 * @property-read Collection<int, News> $news
 * @property-read int|null $news_count
 * @method static Builder|Category isChildren()
 * @method static Builder|Category isActive()
 * @method static Builder|Category parentNull()
 * @method static CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category onlyTrashed()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDeletedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereImage($value)
 * @method static Builder|Category whereImageDescription($value)
 * @method static Builder|Category whereInMobile($value)
 * @method static Builder|Category whereIsActive($value)
 * @method static Builder|Category whereIsVideo($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereNewDesign($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @method static Builder|Category withTrashed()
 * @method static Builder|Category withoutTrashed()
 * @method static Builder|Category orderByRaw($string)
 * @method static pluck(string $value, string $key)
 */
class Category extends Model
{
    use SoftDeletes, HasFactory;

    public const HEADER_CACHE_KEY = 'BL_NEPALI_CATEGORY_HEADER_CACHE';
    public const CACHE_KEY = 'BL_NEPALI_CATEGORY_CACHE';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function scopeIsActive(Builder $builder): Builder
    {
        return $builder
            ->where('is_active', '=', 1)
            ->whereNull('deleted_at');
    }

    public function childCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function scopeIsChildren(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }

    public function scopeParentNull(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }
}
