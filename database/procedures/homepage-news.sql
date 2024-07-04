WITH ranked_news AS (SELECT news.title,
                            news.sub_title,
                            news.id,
                            news.c_id,
                            news.short_description,
                            reporters.image                                                                   AS reporter_image,
                            reporters.name                                                                    AS reporter_name,
                            reporters.name                                                                    AS reporter_id,
                            reporters.slug                                                                    AS reporter_slug,
                            categories.slug                                                                   AS category_slug,
                            categories.name                                                                   AS category_name,
                            categories.id                                                                     AS category_id,
                            news.publish_date,
                            news.date_line,
                            news.image,
                            news.image_description,
                            news.image_alt,
                            ROW_NUMBER() OVER (PARTITION BY news.category_id ORDER BY news.publish_date DESC) AS rn
                     FROM np_news news
                              JOIN categories ON news.category_id = categories.id
                              LEFT JOIN reporters ON news.reporter_id = reporters.id
                     WHERE news.category_id IN (1, 4, 9, 11, 13, 22, 25, 26, 27, 29, 32, 60, 72)
                       AND news.deleted_by IS NULL
                       AND news.deleted_at IS NULL
                       AND news.status = 'active')

SELECT title,
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
       image_alt
FROM ranked_news
WHERE (category_id = 1 AND rn <= 3)
   OR (category_id = 4 AND rn <= 3)
   OR (category_id = 9 AND rn <= 5)
   OR (category_id = 11 AND rn <= 5)
   OR (category_id = 13 AND rn <= 5)
   OR (category_id = 22 AND rn <= 5)
   OR (category_id = 25 AND rn <= 5)
   OR (category_id = 26 AND rn <= 5)
   OR (category_id = 27 AND rn <= 5)
   OR (category_id = 29 AND rn <= 6)
   OR (category_id = 32 AND rn <= 5)
   OR (category_id = 60 AND rn <= 4)
   OR (category_id = 72 AND rn <= 3);
