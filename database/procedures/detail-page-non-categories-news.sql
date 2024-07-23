WITH trending_news AS (
    SELECT
        news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
        news.video_url,
        news.category_id,
        reporters.image AS reporter_image,
        reporters.name AS reporter_name,
        reporters.slug AS reporter_slug,
        news.publish_date,
        news.date_line,
        news.image,
        news.image_description,
        news.image_alt,
        news.slug,
        categories.slug AS category_slug,
        'trending' AS category
    FROM np_news news
             LEFT JOIN reporters ON news.reporter_id = reporters.id
             JOIN categories ON news.category_id = categories.id
    WHERE
        news.deleted_by IS NULL
      AND news.status = 'active'
      AND news.publish_date >= (NOW() - INTERVAL 1 WEEK)
    ORDER BY news.view_count DESC
    LIMIT 5
    ),
    breaking_news AS (
SELECT
    news.title,
    news.sub_title,
    news.id,
    news.c_id,
    news.short_description,
    news.video_url,
    news.category_id,
    reporters.image AS reporter_image,
    reporters.name AS reporter_name,
    reporters.slug AS reporter_slug,
    news.publish_date,
    news.date_line,
    news.image,
    news.image_description,
    news.image_alt,
    news.slug,
    categories.slug AS category_slug,
    'breaking' AS category
FROM np_news news
    LEFT JOIN reporters ON news.reporter_id = reporters.id
    JOIN categories ON news.category_id = categories.id
WHERE
    news.deleted_by IS NULL
  AND news.status = 'active'
ORDER BY news.publish_date DESC
    LIMIT 5
    ),
    special_news AS (
SELECT
    news.title,
    news.sub_title,
    news.id,
    news.c_id,
    news.short_description,
    news.video_url,
    news.category_id,
    reporters.image AS reporter_image,
    reporters.name AS reporter_name,
    reporters.slug AS reporter_slug,
    news.publish_date,
    news.date_line,
    news.image,
    news.image_description,
    news.image_alt,
    news.slug,
    categories.slug AS category_slug,
    'special' AS category
FROM np_news news
    LEFT JOIN reporters ON news.reporter_id = reporters.id
    JOIN categories ON news.category_id = categories.id
WHERE
    news.deleted_by IS NULL
  AND news.status = 'active'
  AND news.is_special = 1
ORDER BY news.publish_date DESC
    LIMIT 4
    )
SELECT * FROM trending_news
UNION ALL
SELECT * FROM breaking_news
UNION ALL
SELECT * FROM special_news
