<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @method static where(string $column, string $operator, mixed $value)
 * @method static count()
 * @method static create(array $attributes)
 * @method  static whereIsAnchor(boolean $value)
 * @method static select(string[] $array)
 * @property int|null $deleted_by
 * @property boolean $is_anchor
 * @property boolean $is_special
 * @property Category $category
 * @property string $image
 */
class News extends Model
{
    const CLOUD_FRONT_URL = 'd18cmnmvofvv98.cloudfront.net';
    const CLOUD_FRONT_URL2 = 'd13sbnamffvfth.cloudfront.net';

    const S3_URL = 'bl-nepali.s3.amazonaws.com';
    const S3_URL2 = 'breaknlinks.s3.amazonaws.com';

    use SoftDeletes, HasFactory, HasEvents;

    protected $table = 'np_news';

    const PUBLISHED = 'Published';

    const UNPUBLISHED = 'Unpublished';

    const DRAFT = 'Draft';

    protected $guarded = [];

    protected $with = ['category'];

    protected $casts = [
        'publish_date' => 'datetime:Y-m-d\TH:i'
    ];

    public static function status(): array
    {
        return [
            self::PUBLISHED,
            self::UNPUBLISHED,
            self::DRAFT,
        ];
    }

    public static function publishStatus(): array
    {
        return ['Yes', 'No', 'Draft'];
    }

    public static function selectNewsStatus(): array
    {
        $publishStatuses = [];
        foreach (News::publishStatus() as $status) {
            $publishStatuses[$status] = $status;
        }
        return $publishStatuses;
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(Reporter::class);
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

    public function getImageAttribute(): string
    {
        return str_replace([self::S3_URL, self::S3_URL2], [self::CLOUD_FRONT_URL, self::CLOUD_FRONT_URL2], $this->attributes['image']);
    }

}
