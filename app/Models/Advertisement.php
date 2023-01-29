<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $attributes)
 * @method static count()
 */
class Advertisement extends Model
{
    protected $guarded = [];

    public static function adsPlacements(): array
    {
        return
            [
                'above' => 'Above',
                'below' => 'Below',
                'aside' => 'Aside'
            ];
    }

    public static function adsPage(): array
    {
        return [
            'all_page' => 'All Pages',
            'main_page' => 'Main Page',
            'detail_page' => 'News Detail Page',
            'category_page' => 'Category Page',
        ];
    }
}
