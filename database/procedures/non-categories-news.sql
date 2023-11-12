(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
        reporters.image as reporter_image,
        reporters.name  as reporter_name,
        reporters.slug  as reporter_slug,
--         guests.name     as guest_name,
--         guests.image    as guest_image,
--         guests.slug     as guest_slug,
        news.publish_date,
        news.date_line,
        news.image,
        news.image_description,
        news.image_alt,
        'trending'      as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND news.status = 'active'
   and publish_date >= (NOW() - INTERVAL 1 WEEK)
 order by view_count desc limit 5)
UNION ALL
(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
        reporters.image as reporter_image,
        reporters.name  as reporter_name,
        reporters.slug  as reporter_slug,
--         guests.name     as guest_name,
--         guests.image    as guest_image,
--         guests.slug     as guest_slug,
        news.publish_date,
        news.date_line,
        news.image,
        news.image_description,
        news.image_alt,
        'breaking'      as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND news.status = 'active'
   AND news.is_breaking = 1
 order by news.publish_date desc limit 5)
UNION ALL
(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
        reporters.image as reporter_image,
        reporters.name  as reporter_name,
        reporters.slug  as reporter_slug,
--         guests.name     as guest_name,
--         guests.image    as guest_image,
--         guests.slug     as guest_slug,
        news.publish_date,
        news.date_line,
        news.image,
        news.image_description,
        news.image_alt,
        'special'    as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND is_special = 1
   AND news.status = 'active'
 order by news.publish_date desc limit 4)
UNION ALL
(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
        reporters.image as reporter_image,
        reporters.name  as reporter_name,
        reporters.slug  as reporter_slug,
--         guests.name     as guest_name,
--         guests.image    as guest_image,
--         guests.slug     as guest_slug,
        news.publish_date,
        news.date_line,
        news.image,
        news.image_description,
        news.image_alt,
        'anchor'        as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND is_anchor = 1
   AND news.status = 'active'
 order by news.publish_date desc limit 5);
