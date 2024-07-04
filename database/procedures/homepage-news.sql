WITH ranked_news AS (
    SELECT
        news.id,
        category_id,
        ROW_NUMBER() OVER (PARTITION BY category_id ORDER BY publish_date DESC) AS row_num
    FROM
        np_news news
    JOIN
        categories c ON c.id = news.category_id
    WHERE
        news.deleted_by IS NULL
        AND news.deleted_at IS NULL
        AND news.status = 'active'
    ORDER BY
        publish_date DESC
    LIMIT 1000
)
SELECT
    news.title,
    news.sub_title,
    news.id,
    news.c_id,
    news.short_description,
    reporters.image AS reporter_image,
    reporters.name AS reporter_name,
    reporters.name AS reporter_id,
    reporters.slug AS reporter_slug,
    categories.slug AS category_slug,
    categories.name AS category_name,
    categories.id AS category_id,
    news.publish_date,
    news.date_line,
    news.image,
    news.image_description,
    categories.body_position,
    news.image_alt
FROM
    ranked_news rn
JOIN
    np_news news ON rn.id = news.id AND news.status = 'active'
JOIN
    categories ON rn.category_id = categories.id
LEFT JOIN
    reporters ON news.reporter_id = reporters.id
WHERE
    rn.row_num <= 9
ORDER BY
    news.publish_date DESC;
