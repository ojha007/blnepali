(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
       
        news.short_description,
        news.video_url,
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
        news.slug,
        'trending'      as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE 
 news.deleted_by is NULL
   AND news.status = 'active'
   and publish_date >= (NOW() - INTERVAL 1 WEEK)
 order by view_count desc
 limit 5)
UNION ALL
(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
         news.video_url,
        reporters.image as reporter_image,
        reporters.name  as reporter_name,
        reporters.slug  as reporter_slug,
--         guests.name     as guest_name,
--         guests.image    as guest_image,
--         guests.slug     as guest_slug,
        news.publish_date,
        news.date_line,
        news.image,
        news.slug,
        news.image_description,
        news.image_alt,
        'breaking'      as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND news.status = 'active'
 order by news.publish_date desc
 limit 5)
UNION ALL
(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
         news.video_url,
        reporters.image as reporter_image,
        reporters.name  as reporter_name,
        reporters.slug  as reporter_slug,
        news.slug,
--         guests.name     as guest_name,
--         guests.image    as guest_image,
--         guests.slug     as guest_slug,
        news.publish_date,
        news.date_line,
        news.image,
        news.image_description,
        news.image_alt,
        'special'       as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND news.status = 'active'
 order by news.publish_date desc
 limit 4)
UNION ALL
(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
         news.video_url,
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
        news.slug,
        'anchor'        as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND news.status = 'active'
 order by news.publish_date desc
 limit 6)
UNION ALL
(SELECT news.title,
        news.sub_title,
        news.id,
        news.c_id,
        news.short_description,
         news.video_url,
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
        news.slug,
        'video'        as category_slug
 from np_news news
          LEFT JOIN reporters ON news.reporter_id = reporters.id
          JOIN categories ON news.category_id = categories.id and categories.slug = 'video-report'
--           LEFT JOIN guests ON news.guest_id = guests.id
 WHERE news.deleted_by is NULL
   AND news.status = 'active'
 order by news.publish_date desc
 limit 5);
