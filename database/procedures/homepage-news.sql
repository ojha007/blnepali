WITH ranked_news AS (SELECT n.title,
                            n.sub_title,
                            n.id,
                            n.c_id,
                            n.short_description,
                            r.image                                                                     AS reporter_image,
                            r.name                                                                      AS reporter_name,
                            r.id                                                                        AS reporter_id,
                            r.slug                                                                      AS reporter_slug,
                            c.slug                                                                      AS category_slug,
                            c.name                                                                      AS category_name,
                            c.id                                                                        AS category_id,
                            n.publish_date,
                            n.date_line,
                            n.image,
                            n.image_description,
                            n.image_alt,
                            g.name                                                                      AS guest_name,
                            ROW_NUMBER() OVER (PARTITION BY n.category_id ORDER BY n.publish_date DESC) AS rn
                     FROM np_news n
                              JOIN
                          categories c ON n.category_id = c.id
                              LEFT JOIN
                          reporters r ON n.reporter_id = r.id
                              LEFT JOIN
                          guests g ON n.guest_id = g.id
                     WHERE n.deleted_by IS NULL
                       AND n.deleted_at IS NULL
                       AND c.new_design is true
                       AND n.status = 'active')

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
       image_alt,
       guest_name
FROM ranked_news
WHERE (category_slug = 'sports' AND rn <= 3)
   OR (category_slug = 'break' AND rn <= 3)
   OR (category_slug = 'lifestyle' AND rn <= 3)
   OR (category_slug = 'econimics' AND rn <= 3)
   OR (category_slug = 'bl-special' AND rn <= 4)
   OR (category_slug = 'news' AND rn <= 7)
   OR (category_slug = 'art-1' AND rn <= 3)
   OR (category_slug = 'literature' AND rn <= 4)
   OR (category_slug = 'blogs' AND rn <= 4)
   OR (category_slug = 'interview' AND rn <= 5)
   OR (category_slug = 'tourism' AND rn <= 3)
   OR (category_slug = 'anchor' AND rn <= 6)
   OR (category_slug = 'opinion' AND rn <= 3)
ORDER BY publish_date DESC;
