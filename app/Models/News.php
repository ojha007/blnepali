<?php

namespace App\Models;

use App\User;
use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property int $c_id
 * @property int $category_id
 * @property string|null $sub_title
 * @property string|null $guest
 * @property int|null $reporter_id
 * @property int $is_anchor
 * @property int $is_special
 * @property string $image
 * @property string|null $image_description
 * @property Carbon $publish_date
 * @property string|null $video_url
 * @property string|null $external_url
 * @property int $view_count
 * @property string|null $short_description
 * @property string $description
 * @property string|null $date_line
 * @property string|null $slug
 * @property string|null $image_alt
 * @property int $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property int $is_breaking
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Category $category
 * @property-read User $createdBy
 * @property-read User|null $deletedBy
 * @property-read Reporter|null $reporter
 * @property-read User|null $updatedBy
 *
 * @method static NewsFactory factory(...$parameters)
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News onlyTrashed()
 * @method static Builder|News query()
 * @method static Builder|News isActive()
 * @method static Builder|News isAnchor()
 * @method static Builder|News isSpecial()
 * @method static Builder|News whereCId($value)
 * @method static Builder|News whereCategoryId($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereCreatedBy($value)
 * @method static Builder|News whereDateLine($value)
 * @method static Builder|News whereDeletedAt($value)
 * @method static Builder|News whereDeletedBy($value)
 * @method static Builder|News whereDescription($value)
 * @method static Builder|News whereExternalUrl($value)
 * @method static Builder|News whereGuest($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereImage($value)
 * @method static Builder|News whereImageAlt($value)
 * @method static Builder|News whereImageDescription($value)
 * @method static Builder|News whereIsAnchor($value)
 * @method static Builder|News whereIsBreaking($value)
 * @method static Builder|News whereIsSpecial($value)
 * @method static Builder|News wherePublishDate($value)
 * @method static Builder|News whereReporterId($value)
 * @method static Builder|News whereShortDescription($value)
 * @method static Builder|News whereSlug($value)
 * @method static Builder|News whereStatus($value)
 * @method static Builder|News whereSubTitle($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @method static Builder|News whereUpdatedBy($value)
 * @method static Builder|News whereVideoUrl($value)
 * @method static Builder|News whereViewCount($value)
 * @method static Builder|News withTrashed()
 * @method static Builder|News withoutTrashed()
 * @method static string getCacheKey($cid)
 */
class News extends Model
{
    use HasEvents, HasFactory, SoftDeletes;

    const CLOUD_FRONT_URL = 'd2y5l9fi6urcm1.cloudfront.net';

    const CACHE_KEY = 'BL_NEPALI_CACHE_NEWS';

    const PUBLISHED = 'Published';

    const UNPUBLISHED = 'Unpublished';

    const DRAFT = 'Draft';

    protected $table = 'np_news';

    protected $guarded = [];

    protected $with = ['category'];

    protected $casts = [
        'publish_date' => 'datetime:Y-m-d\TH:i',
    ];

    public static function status(): array
    {
        return [
            self::PUBLISHED,
            self::UNPUBLISHED,
            self::DRAFT,
        ];
    }

    public static function selectNewsStatus(): array
    {
        $publishStatuses = [];
        foreach (News::publishStatus() as $status) {
            $publishStatuses[$status] = $status;
        }

        return $publishStatuses;
    }

    public static function publishStatus(): array
    {
        return ['Yes', 'No', 'Draft'];
    }

    public static function otherNewsCacheKey(): string
    {
        return sprintf(self::CACHE_KEY.'::%s', 'OTHER_NEWS');
    }

    public static function getCacheKey(int|string $cId): string
    {
        return sprintf(self::CACHE_KEY.'::%s', $cId);
    }
    
    

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(Reporter::class);
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function scopeIsActive(Builder $builder): Builder
    {
        return $builder->where('status', 'active');
    }

    public function scopeIsAnchor(Builder $builder): Builder
    {
        return $builder->where('is_anchor', '=', 1);
    }

    public function scopeIsSpecial(Builder $builder): Builder
    {
        return $builder->where('is_special', '=', 1);
    }
}
