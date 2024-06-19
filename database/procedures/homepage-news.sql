 WITH ranked_news
         AS (SELECT news.id,
                    category_id,
                    ROW_NUMBER() OVER (PARTITION BY category_id ORDER BY publish_date DESC) AS row_num
             FROM np_news news
                      JOIN categories c ON c.id = news.category_id
             WHERE news.deleted_by IS NULL
               AND news.deleted_at IS NULL
               AND c.body_position IS NOT NULL
               AND news.status = 'active'
               AND c.body_position < 17
             order by publish_date desc
             limit 1000)
SELECT news.title,
       news.sub_title,
       news.id,
       news.c_id,
       news.short_description,
       reporters.image as reporter_image,
       reporters.name  as reporter_name,
       reporters.name  as reporter_id,
       reporters.slug  as reporter_slug,
       categories.slug as category_slug,
       categories.name as category_name,
       categories.id   as category_id,
       news.publish_date,
       news.date_line,
       news.image,
       news.image_description,
       categories.body_position,
       news.image_alt
FROM ranked_news rn
         JOIN np_news news ON rn.id = news.id AND news.status = 'active'
         JOIN categories ON rn.category_id = categories.id AND body_position IS NOT NULL
         LEFT JOIN reporters ON news.reporter_id = reporters.id
WHERE rn.row_num <= 9
  and body_position < 17
ORDER BY news.publish_date DESC;
