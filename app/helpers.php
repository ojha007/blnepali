<?php

use App\Models\News;
use Illuminate\Support\Str;

/**
 * @param  $status
 * @return string
 */
function spanByStatus($status): string
{
    switch (strtolower($status)) {
        case 'active':
        case 'yes':
        case '1':
            $labelClass = 'label-success';
            $labelName = 'Active';
            break;
        case 'no';
        case '0':
            $labelClass = 'label-warning';
            $labelName = 'Inactive';
            break;
        case 'draft':
            $labelClass = 'label-info';
            $labelName = 'Draft';
            break;
        default:
            $labelClass = 'label-warning';
            $labelName = 'Pending';

    }
    return sprintf('<span class="label btn btn-flat %s">%s</span>', $labelClass, ucfirst($labelName));
}


function getResizeImage(string $imageUrl, ?string $filter = null): string
{
    $urlParts = parse_url($imageUrl);

    if (!$urlParts || !isset($urlParts['host'])) {
        return $imageUrl;
    }

    if (!Str::contains($urlParts['host'], 's3.amazonaws.com')) {
        return $imageUrl;
    }

    $urlParts['host'] = News::CLOUD_FRONT_URL;
    $urlParts['path'] = sprintf("%s%s", $filter, $urlParts['path']);

    $path = sprintf(
        '%s://%s%s',
        $urlParts['scheme'] ?? 'https',
        $urlParts['host'],
        $urlParts['path']
    );

    if (isset($urlParts['query'])) {
        return sprintf('%s/%s', $path, $urlParts['query']);
    }

    return $path;
}

function getImageSrcSet(string $imageUrl, array $dimensions): array
{
    $resizedUrls = [];

    foreach ($dimensions as $dimension) {
        $urlParts = parse_url($imageUrl);

        if (!$urlParts) {
            return [$imageUrl];
        }

        $urlParts['host'] = News::CLOUD_FRONT_URL;

        if (!isset($dimension['filter'])) {
            return [$imageUrl];
        }

        $urlParts['path'] = sprintf("%s/%s", $dimension['filter'], $urlParts['path']);
        $resizedUrls[] = sprintf(
            '%s://%s/%s',
            $urlParts['scheme'],
            $urlParts['host'] . $urlParts['path'],
            $urlParts['query']
        );

    }
    return $resizedUrls;
}
