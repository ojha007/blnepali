WITH banner_news
         AS (SELECT news.title,
                    news.id,
                    news.c_id,
                    news.short_description,
                    news.category_id,
                    news.image,
                    news.image_visible,
                    news.banner_position,
                    categories.slug AS category_slug,
                    ROW_NUMBER()       OVER (PARTITION BY banner_position ORDER BY publish_date DESC) AS rn
             FROM np_news news
                      LEFT JOIN reporters ON news.reporter_id = reporters.id
                      JOIN categories ON news.category_id = categories.id
             where is_banner = 1
               and news.deleted_at is null
               and news.deleted_by is null
               and news.status = 'active')
SELECT *
FROM banner_news
WHERE rn = 1
  AND banner_position IN (1, 2, 3);
