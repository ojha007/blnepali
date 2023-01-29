<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @method static where(string $string, bool $true)
 * @method static count()
 * @method static create(array $attributes)
 * @property int|mixed|string|null $deleted_by
 */
class News extends Model
{
    use SoftDeletes;
    protected $table = 'np_news';

    const PUBLISHED = 'Published';
    const UNPUBLISHED = 'Unpublished';

    const DRAFT = 'Draft';

    protected $fillable = [
        'title', 'sub_title',
        'guest',
        'reporter_id',
        'slug',
        'is_special',
        'is_anchor',
        'date_line',
        'description',
        'short_description',
        'view_count',
        'external_url',
        'video_url',
        'publish_date', 'expiry_date',
        'image_alt', 'is_active',
        'is_recommended',
        'image',
        'image_description',
    ];
    protected $with = ['categories'];

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

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'news_categories');
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

}
