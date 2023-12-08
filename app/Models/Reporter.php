<?php

namespace App\Models;

use Database\Factories\ReporterFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Reporter
 *
 * @method static where(array $where)
 * @method static whereActive(string $column)
 * @method static whereNull(string $column)
 * @method static pluck(string $value, string $key)
 * @method static withCount(string $relations)
 * @method static create(array $attributes)
 * @method static count()
 * @method static orderByRaw(string $string)
 * @property int $id
 * @property string $name
 * @property string|null $organization
 * @property string|null $facebook_url
 * @property string|null $twitter_url
 * @property string|null $designation
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $address
 * @property string $slug
 * @property string|null $caption
 * @property string|null $description
 * @property string|null $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, News> $news
 * @property-read int|null $news_count
 * @method static ReporterFactory factory(...$parameters)
 * @method static Builder|Reporter newModelQuery()
 * @method static Builder|Reporter newQuery()
 * @method static Builder|Reporter onlyTrashed()
 * @method static Builder|Reporter query()
 * @method static Builder|Reporter whereAddress($value)
 * @method static Builder|Reporter whereCaption($value)
 * @method static Builder|Reporter whereCreatedAt($value)
 * @method static Builder|Reporter whereDeletedAt($value)
 * @method static Builder|Reporter whereDescription($value)
 * @method static Builder|Reporter whereDesignation($value)
 * @method static Builder|Reporter whereEmail($value)
 * @method static Builder|Reporter whereFacebookUrl($value)
 * @method static Builder|Reporter whereId($value)
 * @method static Builder|Reporter whereImage($value)
 * @method static Builder|Reporter whereName($value)
 * @method static Builder|Reporter whereOrganization($value)
 * @method static Builder|Reporter wherePhoneNumber($value)
 * @method static Builder|Reporter whereSlug($value)
 * @method static Builder|Reporter whereTwitterUrl($value)
 * @method static Builder|Reporter whereUpdatedAt($value)
 * @method static Builder|Reporter withTrashed()
 * @method static Builder|Reporter withoutTrashed()
 */
class Reporter extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'reporters';

    protected $guarded = [];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
