WITH ranked_news AS (
    SELECT 
        news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
        reporters.image AS reporter_image,
        reporters.name AS reporter_name,
        reporters.id AS reporter_id, -- Changed alias to avoid conflict
        reporters.slug AS reporter_slug,
        categories.slug AS category_slug,
        categories.name AS category_name,
        categories.id AS category_id,
        news.publish_date,
        news.date_line,
        news.image,
        news.image_description,
        news.image_alt,
        guests.name AS guest_name,
        ROW_NUMBER() OVER (PARTITION BY news.category_id ORDER BY news.publish_date DESC) AS rn
    FROM 
        np_news news
    JOIN 
        categories ON news.category_id = categories.id
    LEFT JOIN 
        reporters ON news.reporter_id = reporters.id
    LEFT JOIN  
        guests ON news.guest_id = guests.id
    WHERE 
        news.deleted_by IS NULL
        AND news.deleted_at IS NULL
        AND categories.slug IN ('sports', 'break', 'bl-special', 'economics', 'news', 'art-1', 'literature', 'blogs', 'tourism', 'anchor', 'opinion', 'crime', 'environment')
        AND news.status = 'active'
)

SELECT 
    title,
    sub_title,
    id,
    c_id,
    short_description,
    reporter_image,
    reporter_name,
    reporter_id,
    reporter_slug,
    category_slug,
    category_name,
    category_id,
    publish_date,
    date_line,
    image,
    image_description,
    image_alt,
    guest_name
FROM 
    ranked_news
WHERE 
    (category_slug = 'sports' AND rn <= 2)
    OR (category_slug = 'break' AND rn <= 2)
    OR (category_slug = 'bl-special' AND rn <= 4)
    OR (category_slug = 'economics' AND rn <= 2)
    OR (category_slug = 'news' AND rn <= 5)
    OR (category_slug = 'art-1' AND rn <= 3)
    OR (category_slug = 'literature' AND rn <= 5)
    OR (category_slug = 'blogs' AND rn <= 3)
    OR (category_slug = 'tourism' AND rn <= 5)
    OR (category_slug = 'anchor' AND rn <= 6)
    OR (category_slug = 'opinion' AND rn <= 4)
    OR (category_slug = 'crime' AND rn <= 7)
    OR (category_slug = 'environment' AND rn <= 8)
ORDER BY 
    publish_date DESC;
